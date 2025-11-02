<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseKendaraanModel;
use App\Models\Admin\DatabaseTerintegrasiModel;
use App\Models\Admin\FetchModel;
use App\Models\Admin\KendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $kendaraanModel;
    protected $dataBaseKendaraanModel;
    protected $kendaraanTerintegrasiModel;
    protected $client;
    protected $fetchModel;


    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
        $this->dataBaseKendaraanModel = new DatabaseKendaraanModel();
        $this->kendaraanTerintegrasiModel = new DatabaseTerintegrasiModel();
        $this->client = service('curlrequest');
        $this->fetchModel = new FetchModel();
    }

    public function index()
    {

        $db_ptsp = $this->kendaraanModel->countAllResults();
        $db_terintegrasi = $this->kendaraanTerintegrasiModel->countAllResults();
        $db_2014 = $this->dataBaseKendaraanModel->countAllResults();

        $total_kendaraan = $db_ptsp + $db_2014 + $db_terintegrasi;


        if (session()->get('csrf') !== null) {
            $operator_data = [];
            $kendaraan = $this->kendaraanModel->getDataKendaraan();

            foreach ($kendaraan as $data_operator) {

                $jmlh_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($data_operator->operator_kendaraan);

                $operator_data[] = [
                    'operator_kendaraan' => $data_operator->operator_kendaraan,
                    'jumlah_kendaraan' => count($jmlh_kendaraan)
                ];
            }

            // $total_kendaraan = $this->kendaraanModel->countAllResults();
        } else {

            $token_data = $this->fetchModel->getToken();

            $csrf = $token_data["token"];
            session()->set([
                'csrf' => $csrf
            ]);


            $operator_data = [];
            $kendaraan = $this->kendaraanModel->getDataKendaraan();

            foreach ($kendaraan as $data_operator) {

                $jmlh_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($data_operator->operator_kendaraan);

                $operator_data[] = [
                    'operator_kendaraan' => $data_operator->operator_kendaraan,
                    'jumlah_kendaraan' => count($jmlh_kendaraan)
                ];
            }
            // $total_kendaraan = $this->kendaraanModel->countAllResults();
        }


        $data = [
            'title' => 'Dashboard SIREKOM',
            'operator_data' => $operator_data,
            'total_kendaraan' => $total_kendaraan

        ];

        return view('backoffice/dashboard_v', $data);
    }
}

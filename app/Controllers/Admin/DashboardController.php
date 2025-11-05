<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseKendaraanModel;
use App\Models\Admin\DatabaseTerintegrasiModel;
use App\Models\Admin\FetchModel;
use App\Models\Admin\KendaraanModel;
use App\Models\Admin\PengajuanRekomendasiModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $kendaraanModel;
    protected $dataBaseKendaraanModel;
    protected $kendaraanTerintegrasiModel;
    protected $client;
    protected $pengajuanRekomendasiModel;
    protected $fetchModel;


    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
        $this->dataBaseKendaraanModel = new DatabaseKendaraanModel();
        $this->kendaraanTerintegrasiModel = new DatabaseTerintegrasiModel();
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
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
        }

        $status_pengajuan = $this->pengajuanRekomendasiModel->where(["status_perizinan_id" => 1])->countAllResults();
        $status_pengajuan_validasi = $this->pengajuanRekomendasiModel->where(["status_perizinan_id" => 2])->countAllResults();
        $status_pengajuan_eoffice = $this->pengajuanRekomendasiModel->where(["status_perizinan_id" => 3])->countAllResults();
        $status_pengajuan_terbit = $this->pengajuanRekomendasiModel->where(["status_perizinan_id" => 4])->countAllResults();
        $status_pengajuan_ditolak = $this->pengajuanRekomendasiModel->where(["status_perizinan_id" => 5])->countAllResults();

        $total_pengajuan_rekom = $this->pengajuanRekomendasiModel->countAllResults();

        $data = [
            'title' => 'Dashboard SIREKOM',
            'operator_data' => $operator_data,
            'total_kendaraan' => $total_kendaraan,
            'status_pengajuan' => $status_pengajuan,
            'status_pengajuan_validasi' => $status_pengajuan_validasi,
            'status_pengajuan_eoffice' => $status_pengajuan_eoffice,
            'status_pengajuan_terbit' => $status_pengajuan_terbit,
            'status_pengajuan_ditolak' => $status_pengajuan_ditolak,
            'total_pengajuan' => $total_pengajuan_rekom,
        ];

        return view('backoffice/dashboard_v', $data);
    }
}

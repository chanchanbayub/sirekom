<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseKendaraanModel;
use App\Models\Admin\DatabaseTerintegrasiModel;
use App\Models\Admin\FetchModel;
use App\Models\Admin\KendaraanModel;
use App\Models\Admin\ProfilUsersModel;
use CodeIgniter\HTTP\ResponseInterface;

class DashboardController extends BaseController
{
    protected $kendaraanModel;
    protected $profilUsersModel;
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
        $this->profilUsersModel = new ProfilUsersModel();
    }

    public function index()
    {
        $id = session()->get('id');

        if ($id != null) {
            $profil_users = $this->profilUsersModel->where(["users_id" => $id])->first();

            if (session()->get('csrf') != null) {
                $data_kr_operator = [];

                if ($profil_users != null) {
                    $jmlh_kendaraan = $this->kendaraanModel->where(["operator" => $profil_users["nama_perusahaan"]])->first();
                    // dd($jmlh_kendaraan);
                    $data_kr_operator[] = [
                        'operator_kendaraan' => $jmlh_kendaraan["operator"],
                        'jumlah_kendaraan' => count($jmlh_kendaraan)
                    ];
                }

                $jumlah_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($profil_users["nama_perusahaan"]);

                $total_kendaraan = count($jumlah_kendaraan);
                $profil_users = $profil_users["nama_perusahaan"];
            } else {
                $token_data = $this->fetchModel->getToken();

                $csrf = $token_data["token"];
                session()->set([
                    'csrf' => $csrf
                ]);

                $data_kr_operator = [];

                if ($profil_users != null) {
                    $jmlh_kendaraan = $this->kendaraanModel->where(["operator" => $profil_users["nama_perusahaan"]])->first();
                    // dd($jmlh_kendaraan);
                    $data_kr_operator[] = [
                        'operator_kendaraan' => $jmlh_kendaraan["operator"],
                        'jumlah_kendaraan' => count($jmlh_kendaraan)
                    ];
                }

                $jumlah_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($profil_users["nama_perusahaan"]);

                $total_kendaraan = count($jumlah_kendaraan);
                $profil_users = $profil_users["nama_perusahaan"];
            }
        } else {
            return redirect()->back('auth/login');
        }

        $data = [
            'title' => 'Dashboard SIREKOM',
            'profil' => $profil_users,
            'operator_data' => $data_kr_operator,
            'total_kendaraan' => $total_kendaraan

        ];

        return view('operator/dashboard_v', $data);
    }
}

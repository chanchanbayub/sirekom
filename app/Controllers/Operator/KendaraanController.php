<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\Admin\FetchModel;
use App\Models\Operator\KendaraanModel;
use App\Models\Operator\ProfilUsersModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class KendaraanController extends BaseController
{
    protected $kendaraanModel;
    protected $profilUsersModel;
    protected $importExcel;
    protected $validation;
    protected $fetchModel;
    protected $client;

    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
        // $this->client = \Config\Services::curlrequest();
        $this->fetchModel = new FetchModel();
        $this->profilUsersModel = new ProfilUsersModel();
        // $this->client = service('curlrequest');

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $id = session()->get('id');

        $profil_users = $this->profilUsersModel->where(["users_id" => $id])->first();

        $data = [
            'title' => 'Database Kendaraan',
            'send_data' => urldecode($profil_users["nama_perusahaan"])
            // 'kendaraan_data' => $operator_data,
            // 'total_kendaraan' => $total_kendaraan
        ];

        return view('operator/detail_kendaraan_v', $data);
    }

    public function getKendaraanDataTable($nama_operator)
    {
        if ($this->request->isAjax()) {

            $nama_operator_data = base64_decode($nama_operator);
            // dd($nama_operator_data);

            $data_kendaraan = $this->kendaraanModel->getDataKendaraanTable($nama_operator_data);
            // dd($data_kendaraan);
            return DataTable::of($data_kendaraan)
                // ->add('action', function ($row) {
                //     return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                //                                     <i class="ti ti-eye"></i>
                //                                 </button>';
                // })
                ->setSearchableColumns(['nomor_kendaraan',  'operator', 'merk', 'nomor_uji'])
                ->addNumbering('nomor')->toJson(true);
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KendaraanModel;
use App\Models\Admin\PengajuanRekomendasiModel;
use App\Models\Admin\StatusPerizinanModel;
use App\Models\Admin\ValidasiRekomModel;
use CodeIgniter\HTTP\ResponseInterface;

class ValidasiRekomController extends BaseController
{
    // protected $usersManagementModel;
    // protected $pengantarPerizinanModel;
    // protected $jenisPerizinanModel;
    protected $statusPerizinanModel;
    protected $validation;
    protected $validasiRekomModel;
    protected $kendaraanModel;
    // protected $importExcel;
    // protected $kendaraanModel;
    protected $pengajuanRekomendasiModel;
    // protected $profilUsersModel;
    // protected $client;
    // protected $dateTime;


    public function __construct()
    {
        $this->statusPerizinanModel = new StatusPerizinanModel();
        $this->validation = \Config\Services::validation();
        $this->validasiRekomModel = new ValidasiRekomModel();
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
        $this->kendaraanModel = new KendaraanModel();
        //    $this->pengantarPerizinanModel = new PengantarPerizinanModel();
        //     $this->jenisPerizinanModel = new JenisPerizinanModel();
        //     $this->usersManagementModel = new UsersManagemenentModel();
    }

    public function update_status_rekom()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_perizinan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'status_perizinan_id' => $this->validation->getError('status_perizinan_id'),
                    ]
                ];
            } else {

                $rekom_id = $this->request->getPost('rekom_id');
                $status_perizinan_id = $this->request->getPost('status_perizinan_id');

                $this->pengajuanRekomendasiModel->update($rekom_id, [
                    'status_perizinan_id' => $status_perizinan_id
                ]);

                $alert = [
                    'success' => 'Status Rekomendasi Berhasil diubah'
                ];
            }

            return json_encode($alert);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'validasi_stnk' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'validasi_kir' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'validasi_stnk' => $this->validation->getError('validasi_stnk'),
                        'validasi_kir' => $this->validation->getError('validasi_kir'),
                    ]
                ];
            } else {

                $kendaraan_id = $this->request->getPost('kendaraan_id');
                $rekom_id = $this->request->getPost('id_pengajuan_rekom');
                $validasi_stnk = $this->request->getPost('validasi_stnk');
                $validasi_kir = $this->request->getPost('validasi_kir');

                $this->validasiRekomModel->save([
                    'id_pengajuan_rekom' => strtolower($rekom_id),
                    'kendaraan_id' => strtolower($kendaraan_id),
                    'validasi_stnk' => strtolower($validasi_stnk),
                    'validasi_kir' => strtolower($validasi_kir),
                ]);

                $alert = [
                    'success' => 'Kendaraan Berhasil di Validasi!'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $rekom_id = $this->request->getVar('id_pengajuan_rekom');
            $kendaraan_id = $this->request->getVar('kendaraan_id');

            $pengajuan_rekom = $this->pengajuanRekomendasiModel->where(["id" => $rekom_id])->get()->getRowObject();
            $kendaraan = $this->kendaraanModel->where(["id" => $kendaraan_id])->get()->getRowObject();

            $validasi_data = $this->validasiRekomModel->where(["kendaraan_id" => $kendaraan_id])->get()->getRowObject();

            $data = [
                'pengajuan_rekom' => $pengajuan_rekom,
                'kendaraan' => $kendaraan,
                'validasi_data' => $validasi_data
            ];

            return json_encode($data);
        }
    }

    public function edit_disabled()
    {
        if ($this->request->isAJAX()) {

            $pengajuan_rekom = $this->pengajuanRekomendasiModel->getPengajuanRekom();
            $kendaraan = $this->kendaraanModel->get()->getResultObject();


            $data = [
                'pengajuan_rekom' => $pengajuan_rekom,
                'kendaraan' => $kendaraan
            ];

            return json_encode($data);
        }
    }

    public function update() {}
}

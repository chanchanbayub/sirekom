<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use App\Models\Admin\KodeKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class KodeKendaraanController extends BaseController
{
    protected $jenisKendaraanModel;
    protected $kodeKendaraanModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->kodeKendaraanModel = new KodeKendaraanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Kode Trayek Kendaraan',
            'jenis_kendaraan' => $this->jenisKendaraanModel->getJenisKendaraan(),
        ];

        return view('backoffice/kode_trayek_kendaraan_v', $data);
    }

    public function getKodeKendaraan()
    {
        if ($this->request->isAjax()) {
            $kode_trayek = $this->kodeKendaraanModel->getKode();

            return DataTable::of($kode_trayek)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['jenis_kendaraan',  'kode_kendaraan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kode_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Trayek  Tidak Boleh Kosong !'
                    ]
                ],

                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kode_kendaraan' => $this->validation->getError('kode_kendaraan'),
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),

                    ]
                ];
            } else {

                $kode_kendaraan = $this->request->getPost('kode_kendaraan');
                $jenis_kendaraan_id = $this->request->getPost('jenis_kendaraan_id');

                $this->kodeKendaraanModel->save([
                    'kode_kendaraan' => strtolower($kode_kendaraan),
                    'jenis_kendaraan_id' => $jenis_kendaraan_id,

                ]);

                $alert = [
                    'success' => 'Kode Trayek Berhasil di Simpan!'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_kendaraan = $this->jenisKendaraanModel->getJenisKendaraan();
            $kode_kendaraan = $this->kodeKendaraanModel->where(["id" => $id])->first();

            $data = [
                'jenis_kendaraan' => $jenis_kendaraan,
                'kode_kendaraan' => $kode_kendaraan
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $kode_kendaraan = $this->jenisKendaraanModel->where(["id" => $id])->first();

            $this->kodeKendaraanModel->delete($kode_kendaraan["id"]);

            $alert = [
                'success' => 'Kode Trayek Kendaraan Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'kode_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Kode Trayek  Tidak Boleh Kosong !'
                    ]
                ],

                'jenis_kendaraan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'kode_kendaraan' => $this->validation->getError('kode_kendaraan'),
                        'jenis_kendaraan_id' => $this->validation->getError('jenis_kendaraan_id'),

                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $kode_kendaraan = $this->request->getPost('kode_kendaraan');
                $jenis_kendaraan_id = $this->request->getPost('jenis_kendaraan_id');

                $this->kodeKendaraanModel->update($id, [
                    'kode_kendaraan' => strtolower($kode_kendaraan),
                    'jenis_kendaraan_id' => $jenis_kendaraan_id,

                ]);

                $alert = [
                    'success' => 'Kode Trayek Kendaraan Berhasil di Ubah!'
                ];
            }

            return json_encode($alert);
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class JenisKendaraanController extends BaseController
{
    protected $jenisKendaraanModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisKendaraanModel = new JenisKendaraanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Jenis Kendaraan',
        ];

        return view('backoffice/jenis_kendaraan_v', $data);
    }

    public function getJenisKendaraan()
    {
        if ($this->request->isAjax()) {
            $jenis_kendaraan = $this->jenisKendaraanModel->getKendaraan();

            return DataTable::of($jenis_kendaraan)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['jenis_kendaraan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan' => $this->validation->getError('jenis_kendaraan'),

                    ]
                ];
            } else {

                $jenis_kendaraan = $this->request->getPost('jenis_kendaraan');

                $this->jenisKendaraanModel->save([
                    'jenis_kendaraan' => strtolower($jenis_kendaraan),

                ]);

                $alert = [
                    'success' => 'Jenis Kendaraan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_kendaraan = $this->jenisKendaraanModel->where(["id" => $id])->first();

            return json_encode($jenis_kendaraan);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_kendaraan = $this->jenisKendaraanModel->where(["id" => $id])->first();

            $this->jenisKendaraanModel->delete($jenis_kendaraan["id"]);

            $alert = [
                'success' => 'Jenis Kendaraan Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'jenis_kendaraan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jenis_kendaraan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'jenis_kendaraan' => $this->validation->getError('jenis_kendaraan'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $jenis_kendaraan = $this->request->getPost('jenis_kendaraan');


                $this->jenisKendaraanModel->update($id, [
                    'jenis_kendaraan' => strtolower($jenis_kendaraan),

                ]);

                $alert = [
                    'success' => 'Jenis Kendaraan Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}

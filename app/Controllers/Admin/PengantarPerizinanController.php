<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengantarPerizinanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class PengantarPerizinanController extends BaseController
{
    protected $pengantarPerizinanModel;
    protected $validation;

    public function __construct()
    {
        $this->pengantarPerizinanModel = new PengantarPerizinanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Surat Pengantar Perizinan',
        ];

        return view('backoffice/pengantar_perizinan_v', $data);
    }

    public function getPengantarPerizinan()
    {
        if ($this->request->isAjax()) {
            $surat_pengantar = $this->pengantarPerizinanModel->getPengantarPerizinan();

            return DataTable::of($surat_pengantar)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['surat_pengantar'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'surat_pengantar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Surat Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'surat_pengantar' => $this->validation->getError('surat_pengantar'),

                    ]
                ];
            } else {

                $surat_pengantar = $this->request->getPost('surat_pengantar');

                $this->pengantarPerizinanModel->save([
                    'surat_pengantar' => $surat_pengantar,

                ]);

                $alert = [
                    'success' => 'Surat Pengantar Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $surat_pengantar = $this->pengantarPerizinanModel->where(["id" => $id])->first();

            return json_encode($surat_pengantar);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $surat_pengantar = $this->pengantarPerizinanModel->where(["id" => $id])->first();

            $this->pengantarPerizinanModel->delete($surat_pengantar["id"]);

            $alert = [
                'success' => 'Surat Pengantar Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'surat_pengantar' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'surat_pengantar Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'surat_pengantar' => $this->validation->getError('surat_pengantar'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $surat_pengantar = $this->request->getPost('surat_pengantar');


                $this->pengantarPerizinanModel->update($id, [
                    'surat_pengantar' => $surat_pengantar,

                ]);

                $alert = [
                    'success' => 'Surat Pengantar Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}

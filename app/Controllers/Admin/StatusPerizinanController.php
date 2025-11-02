<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StatusPerizinanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class StatusPerizinanController extends BaseController
{
    protected $statusPerizinanModel;
    protected $validation;

    public function __construct()
    {
        $this->statusPerizinanModel = new StatusPerizinanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Status Perizinan',
        ];

        return view('backoffice/status_perizinan_v', $data);
    }

    public function getStatusPerizinan()
    {
        if ($this->request->isAjax()) {
            $status_perizinan = $this->statusPerizinanModel->getStatus();

            return DataTable::of($status_perizinan)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['status_perizinan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_perizinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Perizinan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_perizinan' => $this->validation->getError('status_perizinan'),

                    ]
                ];
            } else {

                $status_perizinan = $this->request->getPost('status_perizinan');

                $this->statusPerizinanModel->save([
                    'status_perizinan' => strtolower($status_perizinan),

                ]);

                $alert = [
                    'success' => 'Status Perizinan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $Materi = $this->statusPerizinanModel->where(["id" => $id])->first();

            return json_encode($Materi);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $Materi = $this->statusPerizinanModel->where(["id" => $id])->first();

            $this->statusPerizinanModel->delete($Materi["id"]);

            $alert = [
                'success' => 'Status Perizinan Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_perizinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'status_perizinan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_perizinan' => $this->validation->getError('status_perizinan'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $status_perizinan = $this->request->getPost('status_perizinan');


                $this->statusPerizinanModel->update($id, [
                    'status_perizinan' => strtolower($status_perizinan),

                ]);

                $alert = [
                    'success' => 'Status Perizinan Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}

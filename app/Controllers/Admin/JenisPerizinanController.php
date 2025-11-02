<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\JenisPerizinanModel;
use App\Models\Admin\PengantarPerizinanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class JenisPerizinanController extends BaseController
{
    protected $jenisPerizinanModel;
    protected $pengantarPerizinanModel;
    protected $validation;

    public function __construct()
    {
        $this->jenisPerizinanModel = new JenisPerizinanModel();
        $this->pengantarPerizinanModel = new PengantarPerizinanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Jenis Perizinan',
            'pengantar_perizinan' => $this->pengantarPerizinanModel->getSuratPengantar()
        ];

        return view('backoffice/jenis_perizinan_v', $data);
    }

    public function getJenisPerizinan()
    {
        if ($this->request->isAjax()) {
            $jenis_perizinan = $this->jenisPerizinanModel->getPerizinan();

            return DataTable::of($jenis_perizinan)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['jenis_perizinan', 'surat_pengantar'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'surat_pengantar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Surat Pengantar Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_perizinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jenis Perizinan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'surat_pengantar_id' => $this->validation->getError('surat_pengantar_id'),
                        'jenis_perizinan' => $this->validation->getError('jenis_perizinan'),

                    ]
                ];
            } else {

                $surat_pengantar_id = $this->request->getPost('surat_pengantar_id');
                $jenis_perizinan = $this->request->getPost('jenis_perizinan');

                $this->jenisPerizinanModel->save([
                    'surat_pengantar_id' => strtolower($surat_pengantar_id),
                    'jenis_perizinan' => $jenis_perizinan,

                ]);

                $alert = [
                    'success' => 'Jenis Perizinan Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pengatar_perizinan = $this->pengantarPerizinanModel->getSuratPengantar();

            $jenis_perizinan = $this->jenisPerizinanModel->where(["id" => $id])->first();

            $data = [
                'pengantar_perizinan' => $pengatar_perizinan,
                'jenis_perizinan' => $jenis_perizinan
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $jenis_perizinan = $this->jenisPerizinanModel->where(["id" => $id])->first();

            $this->jenisPerizinanModel->delete($jenis_perizinan["id"]);

            $alert = [
                'success' => 'Jenis Perizinan Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'surat_pengantar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Surat Pengantar Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_perizinan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jenis_perizinan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'surat_pengantar_id' => $this->validation->getError('surat_pengantar_id'),
                        'jenis_perizinan' => $this->validation->getError('jenis_perizinan'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $surat_pengantar_id = $this->request->getPost('surat_pengantar_id');
                $jenis_perizinan = $this->request->getPost('jenis_perizinan');


                $this->jenisPerizinanModel->update($id, [
                    'surat_pengantar_id' => strtolower($surat_pengantar_id),
                    'jenis_perizinan' => $jenis_perizinan,

                ]);

                $alert = [
                    'success' => 'Jenis Perizinan Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}

<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengantarPerizinanModel;
use App\Models\Admin\ProfilUsersModel;
use App\Models\Admin\UsersManagemenentModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class ProfilUsersController extends BaseController
{
    protected $pengantarPerizinanModel;
    protected $usersManagementModel;
    protected $profilUserModel;
    protected $validation;
    // protected $client;

    public function __construct()
    {
        $this->pengantarPerizinanModel = new PengantarPerizinanModel();
        $this->usersManagementModel = new UsersManagemenentModel();
        $this->profilUserModel = new ProfilUsersModel();
        $this->validation = \Config\Services::validation();
        // $this->client = \Config\Services::curlrequest();
    }

    public function index()
    {

        $data = [
            'title' => 'Profil Users Management',
            'users_management' => $this->usersManagementModel->getUsersManagement(),
            'pengantar_perizinan' => $this->pengantarPerizinanModel->getSuratPengantar()
        ];

        return view('backoffice/users_profil_v', $data);
    }

    public function getProfil()
    {
        if ($this->request->isAjax()) {
            $users_profil = $this->profilUserModel->getProfil();

            return DataTable::of($users_profil)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->add('view', function ($row) {
                    return '<a href="../legalitas_perusahaan/' .  $row->legalitas_perusahaan . '" class="btn btn-sm btn-outline-success" target="_blank">
                                                    <i class="ti ti-eye"></i>
                                                </a>';
                })


                ->setSearchableColumns(['nama_lengkap', 'nama_perushaan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'users_id' => [
                    'rules' => 'required|is_unique[profil_users_table.users_id]',
                    'errors' => [
                        'required' => 'Users Tidak Boleh Kosong !',
                        'is_unique' => 'Users tersebut sudah terdaftar !'
                    ]
                ],
                'nama_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Perusahaan Tidak Boleh Kosong !'
                    ]
                ],
                'alamat_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Perusahaan Tidak Boleh Kosong !'
                    ]
                ],
                'legalitas_perusahaan' => [
                    'rules' => 'uploaded[legalitas_perusahaan]|max_size[legalitas_perusahaan,5048]|mime_in[legalitas_perusahaan,application/pdf]',
                    'errors' => [
                        'uploaded' => 'Legalitas Tidak Boleh Kosong !',
                        'max_size' => 'Ukuran Terlalu Besar (max : 5MB) !',
                        'mime_in' => 'yang anda upload bukan PDF',
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'users_id' => $this->validation->getError('users_id'),
                        'nama_perusahaan' => $this->validation->getError('nama_perusahaan'),
                        'alamat_perusahaan' => $this->validation->getError('alamat_perusahaan'),
                        'legalitas_perusahaan' => $this->validation->getError('legalitas_perusahaan'),

                    ]
                ];
            } else {

                $users_id = $this->request->getPost('users_id');
                $nama_perusahaan = $this->request->getPost('nama_perusahaan');
                $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
                $legalitas_perusahaan = $this->request->getFile('legalitas_perusahaan');

                $nama_legalitas = $legalitas_perusahaan->getRandomName();

                $this->profilUserModel->save([
                    'users_id' => strtolower($users_id),
                    'nama_perusahaan' => $nama_perusahaan,
                    'alamat_perusahaan' => strtolower($alamat_perusahaan),
                    'legalitas_perusahaan' => $nama_legalitas,
                ]);

                $legalitas_perusahaan->move('legalitas_perusahaan', $nama_legalitas);

                $alert = [
                    'success' => 'Profil Users Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $users_management = $this->usersManagementModel->getUsersManagement();
            $users_profil = $this->profilUserModel->where(["id" => $id])->get()->getRowObject();


            $data = [
                'users_management' => $users_management,
                'users_profil' => $users_profil
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $users_profil = $this->profilUserModel->where(["id" => $id])->get()->getRowObject();

            $path_foto = 'legalitas_perusahaan/' . $users_profil->legalitas_perusahaan;

            $this->profilUserModel->delete($users_profil->id);

            if ($users_profil->legalitas_perusahaan != null) {
                if (file_exists($path_foto)) {
                    unlink($path_foto);
                }
            }

            $alert = [
                'success' => 'Profil Users Berhasil di Hapus!'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'users_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Users Tidak Boleh Kosong !',
                    ]
                ],
                'nama_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Perusahaan Tidak Boleh Kosong !'
                    ]
                ],
                'alamat_perusahaan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Alamat Perusahaan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'users_id' => $this->validation->getError('users_id'),
                        'nama_perusahaan' => $this->validation->getError('nama_perusahaan'),
                        'alamat_perusahaan' => $this->validation->getError('alamat_perusahaan'),

                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $legalitas_lama = $this->request->getPost('legalitas_lama');

                $users_id = $this->request->getPost('users_id');
                $nama_perusahaan = $this->request->getPost('nama_perusahaan');
                $alamat_perusahaan = $this->request->getPost('alamat_perusahaan');
                $legalitas_perusahaan = $this->request->getFile('legalitas_perusahaan');

                $path_legalitas_lama = 'legalitas_perusahaan/' . $legalitas_lama;

                if ($legalitas_perusahaan->getError() == 4) {
                    $nama_legalitas = $legalitas_lama;
                } else {
                    if ($legalitas_lama != null) {
                        if (file_exists($path_legalitas_lama)) {
                            unlink($path_legalitas_lama);
                        }
                    }
                    $nama_legalitas = $legalitas_perusahaan->getRandomName();
                    $legalitas_perusahaan->move('legalitas_perusahaan', $nama_legalitas);
                }

                $this->profilUserModel->update($id, [
                    'users_id' => strtolower($users_id),
                    'nama_perusahaan' => $nama_perusahaan,
                    'alamat_perusahaan' => strtolower($alamat_perusahaan),
                    'legalitas_perusahaan' => $nama_legalitas,
                ]);

                $alert = [
                    'success' => 'Profil Users Berhasil di Update !'
                ];
            }

            return json_encode($alert);
        }
    }
}

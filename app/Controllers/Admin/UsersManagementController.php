<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RoleManagementModel;
use App\Models\Admin\UsersManagemenentModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;

class UsersManagementController extends BaseController
{
    protected $roleManagementModel;
    protected $usersManagementModel;
    protected $validation;

    public function __construct()
    {
        $this->roleManagementModel = new RoleManagementModel();
        $this->usersManagementModel = new UsersManagemenentModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $data = [
            'title' => 'Users Management',
            'role_management' => $this->roleManagementModel->getRoleManagement(),
        ];

        return view('backoffice/users_management_v', $data);
    }

    public function getUsersManagement()
    {
        if ($this->request->isAjax()) {
            $users_management = $this->usersManagementModel->getUsers();

            return DataTable::of($users_management)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-pencil"></i>
                                                </button>
                            <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>';
                })
                ->setSearchableColumns(['nama_lengkap', 'email', 'no_whatsapp'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama  Tidak Boleh Kosong !'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong !',
                        'valid_email' => 'Email yang Anda Masukan Tidak Valid!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong !'
                    ]
                ],
                'no_whatsapp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Whatsapp Tidak Boleh Kosong !'
                    ]
                ],
                'role_management_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('nama_lengkap'),
                        'email' => $this->validation->getError('email'),
                        'password' => $this->validation->getError('password'),
                        'no_whatsapp' => $this->validation->getError('no_whatsapp'),
                        'role_management_id' => $this->validation->getError('role_management_id'),

                    ]
                ];
            } else {

                $nama_lengkap = $this->request->getPost('nama_lengkap');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $no_whatsapp = $this->request->getPost('no_whatsapp');
                $role_management_id = $this->request->getPost('role_management_id');

                $this->usersManagementModel->save([
                    'nama_lengkap' => strtolower($nama_lengkap),
                    'email' => $email,
                    'no_whatsapp' => $no_whatsapp,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role_management_id' => $role_management_id,

                ]);

                $alert = [
                    'success' => 'Users Management Berhasil di Simpan!'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $role_management = $this->roleManagementModel->getRoleManagement();
            $users_management = $this->usersManagementModel->where(["id" => $id])->first();

            $data = [
                'role_management' => $role_management,
                'users_management' => $users_management
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $users_management = $this->roleManagementModel->where(["id" => $id])->first();

            $this->usersManagementModel->delete($users_management["id"]);

            $alert = [
                'success' => 'Users Management Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'nama_lengkap' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama  Tidak Boleh Kosong !'
                    ]
                ],
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong !',
                        'valid_email' => 'Email yang Anda Masukan Tidak Valid!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong !'
                    ]
                ],
                'no_whatsapp' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nomor Whatsapp Tidak Boleh Kosong !'
                    ]
                ],
                'role_management_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Role Management Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'nama_lengkap' => $this->validation->getError('nama_lengkap'),
                        'email' => $this->validation->getError('email'),
                        'password' => $this->validation->getError('password'),
                        'no_whatsapp' => $this->validation->getError('no_whatsapp'),
                        'role_management_id' => $this->validation->getError('role_management_id'),

                    ]
                ];
            } else {

                $id = $this->request->getVar('id');
                $nama_lengkap = $this->request->getPost('nama_lengkap');
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                $no_whatsapp = $this->request->getPost('no_whatsapp');
                $role_management_id = $this->request->getPost('role_management_id');

                $this->usersManagementModel->update($id, [
                    'nama_lengkap' => strtolower($nama_lengkap),
                    'email' => $email,
                    'no_whatsapp' => $no_whatsapp,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role_management_id' => $role_management_id,

                ]);

                $alert = [
                    'success' => 'Users Management Berhasil di Simpan!'
                ];
            }

            return json_encode($alert);
        }
    }
}

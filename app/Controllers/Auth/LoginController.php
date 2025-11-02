<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\Admin\UsersManagemenentModel;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    protected $userManagementModel;
    protected $validation;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->userManagementModel = new UsersManagemenentModel();
    }

    public function index()
    {
        session()->destroy();

        $data = [
            'title' => 'Login Page',

        ];
        return view('auth/login_v', $data);
    }

    public function cek_login()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Tidak Boleh Kosong!',
                        'valid_email' => 'Email Tidak Valid!'
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Tidak Boleh Kosong !'
                    ]
                ],
            ])) {
                $alert = [
                    'error' => [
                        'email' => $this->validation->getError('email'),
                        'password' => $this->validation->getError('password'),
                    ]
                ];
            } else {
                $email = $this->request->getPost('email');
                $password = $this->request->getPost('password');
                // dd($password);

                $user_management = $this->userManagementModel->getUserManagementData($email);
                // dd($user_management->password);

                if ($user_management == null) {
                    $alert = [
                        'errors' => 'Email / Password Tidak ditemukan!'
                    ];
                } else {
                    if (password_verify($password, $user_management->password)) {
                        if ($user_management->role_management_id == 2) {
                            $data = [
                                'id' => $user_management->id,
                                'nama_lengkap' => $user_management->nama_lengkap,
                                'email' => $user_management->email,
                                // 'mitra_pengajar_id' => $user_management->mitra_pengajar_id,
                                'role_management' => $user_management->role_management,
                                'role_management_id' => $user_management->role_management_id,
                                'isLogedIn' => true
                            ];
                            session()->set($data);
                            $alert = [
                                'success' => 'Berhasil Login !',
                                'url' => '/operator/dashboard'
                            ];
                        } else if ($user_management->role_management_id == 1) {
                            $data = [
                                'id' => $user_management->id,
                                'nama_lengkap' => $user_management->nama_lengkap,
                                'email' => $user_management->email,
                                // 'mitra_pengajar_id' => $user_management->mitra_pengajar_id,
                                'role_management' => $user_management->role_management,
                                'role_management_id' => $user_management->role_management_id,
                                'isLogedIn' => true
                            ];
                            session()->set($data);
                            $alert = [
                                'success' => 'Berhasil Login !',
                                'url' => '/backoffice/dashboard'
                            ];
                        }
                    } else {
                        $alert = [
                            'errors' => 'Email / Password Salah'
                            // 'url' => '/backoffice/dashboard'
                        ];
                    }
                    return json_encode($alert);
                };
            }
        }
    }


    public function logout()
    {

        session()->destroy();

        return redirect()->to('/auth/login');
    }
}

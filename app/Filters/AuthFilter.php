<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (!session()->get('isLogedIn')) {
            return redirect()->to(site_url('auth/login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('isLogedIn') == true) {
            if (session()->get('role_management_id') == 1) {
                return redirect()->to(site_url('backoffice/dashboard'));
            } else {
                return redirect()->to(site_url('operator/dashboard'));
            }
        }
    }
}

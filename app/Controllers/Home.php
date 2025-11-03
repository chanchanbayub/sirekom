<?php

namespace App\Controllers;

use App\Models\Admin\PengajuanRekomendasiModel;

class Home extends BaseController
{
    protected $pengajuanRekomendasiModel;
    protected $validation;

    public function __construct()
    {
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        // return view('welcome_message');
        return view('landing_pages');
    }

    public function search()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'noPengajuanRekom' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],


            ])) {
                $alert = [
                    'error' => [
                        'noPengajuanRekom' => $this->validation->getError('noPengajuanRekom'),
                    ]
                ];
            } else {

                $noPengajuanRekom = $this->request->getVar('noPengajuanRekom');

                $pengajuan_rekomendasi = $this->pengajuanRekomendasiModel->getPengajuanRekomWhereNoPengajuan($noPengajuanRekom);

                if ($pengajuan_rekomendasi == null) {
                    $alert = [
                        'null' => 'Data Tidak Ditemukan'
                    ];
                } else {
                    $alert = [
                        'pengajuan_rekom' => $pengajuan_rekomendasi
                    ];
                }
            }

            return json_encode($alert);
        }
    }
}

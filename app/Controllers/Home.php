<?php

namespace App\Controllers;

use App\Models\Admin\DatabaseKendaraanModel;
use App\Models\Admin\DatabaseTerintegrasiModel;
use App\Models\Admin\KendaraanModel;
use App\Models\Admin\PengajuanRekomendasiModel;

class Home extends BaseController
{
    protected $pengajuanRekomendasiModel;
    protected $kendaraanModel;
    protected $dataBaseKendaraanModel;
    protected $dataBaseTerintegrasiModel;
    protected $validation;


    public function __construct()
    {
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
        $this->validation = \Config\Services::validation();
        $this->kendaraanModel = new KendaraanModel();
        $this->dataBaseKendaraanModel = new DatabaseKendaraanModel();
        $this->dataBaseTerintegrasiModel = new DatabaseTerintegrasiModel();
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

    public function database_terdaftar()
    {
        // db_ptsp
        $kendaraan = $this->kendaraanModel->getDataKendaraan();
        $total_kendaraan_ptsp = $this->kendaraanModel->countAllResults();
        $jenis_kendaraan_ptsp = $this->kendaraanModel->getJenisKendaraan();

        $kode_trayek_reguler = $this->kendaraanModel->getTrayekReguler();

        foreach ($kode_trayek_reguler as $kode_trayek) {
            $kode = $this->kendaraanModel->getKendaraanWhereKodeTrayek($kode_trayek->kode_trayek_reguler);

            $trayek_reguler[] = [
                'kode_trayek_reguler' => $kode_trayek->kode_trayek_reguler,
                'jumlah' => count($kode)
            ];
        }

        foreach ($jenis_kendaraan_ptsp as $jenis_kendaraan) {

            $jenis = $this->kendaraanModel->getJenisKendaraanWhereJenis($jenis_kendaraan->jenis_kendaraan);

            $jenis_kendaaraan_ptsp_data[] = [
                'jenis_kendaraan' => $jenis_kendaraan->jenis_kendaraan,
                'jumlah' => count($jenis)
            ];
        }

        foreach ($kendaraan as $data_operator) {

            $jmlh_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($data_operator->operator_kendaraan);

            $operator_data_ptsp[] = [
                // 'id' => $data_operator->id,
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }
        // end db_ptsp

        // db_2014

        $kendaraan_2014 = $this->dataBaseKendaraanModel->getDataKendaraan2014();
        $total_db_2014 = $this->dataBaseKendaraanModel->countAllResults();

        $jenis_kendaraan_2014 = $this->dataBaseKendaraanModel->getDataJenisKendaraan();

        $kode_trayek = $this->dataBaseKendaraanModel->getKodeTrayek();

        foreach ($kode_trayek as $kode_trayek) {
            $kode = $this->dataBaseKendaraanModel->getKodeTrayek2014($kode_trayek->kode_trayek);

            $trayek[] = [
                'kode_trayek' => $kode_trayek->kode_trayek,
                'jumlah' => count($kode)
            ];
        }

        foreach ($jenis_kendaraan_2014 as $jenis_kendaraan_2014) {

            $jenis = $this->dataBaseKendaraanModel->getDataKendaraan2014WhereJenis($jenis_kendaraan_2014->jenis_kendaraan);

            $jenis_kendaaraan_2014_data[] = [
                'jenis_kendaraan' => $jenis_kendaraan_2014->jenis_kendaraan,
                'jumlah' => count($jenis)
            ];
        }
        // dd($jenis_kendaaraan_2014_data);

        foreach ($kendaraan_2014 as $data_operator) {

            $jmlh_kendaraan = $this->dataBaseKendaraanModel->getDataKendaraan2014WhereOperator($data_operator->operator_kendaraan);

            $operator_2014[] = [
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }

        // $operator_terintegrasi = [];
        $kendaraan_terintegrasi = $this->dataBaseTerintegrasiModel->getDataKendaraanTerintegrasi();
        // dd($kendaraan);
        $jenis_kendaraan_terintegrasi = $this->dataBaseTerintegrasiModel->getJenisKendaraanTerintegrasi();

        foreach ($jenis_kendaraan_terintegrasi as $jenis_kendaraan_terintegrasi) {

            $jenis = $this->dataBaseTerintegrasiModel->getDataKendaraanTerintegrasiWhereJenisKendaraan($jenis_kendaraan_terintegrasi->jenis_kendaraan);

            $jenis_kendaaraan_terintegrasi[] = [
                'jenis_kendaraan' => $jenis_kendaraan_terintegrasi->jenis_kendaraan,
                'jumlah' => count($jenis)
            ];
        }

        foreach ($kendaraan_terintegrasi as $data_operator) {

            $jmlh_kendaraan = $this->dataBaseTerintegrasiModel->getDataKendaraanTerintegrasiWhereOperator($data_operator->operator_kendaraan);

            $operator_terintegrasi[] = [
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }

        $total_kendaraan_terintegrasi = $this->dataBaseTerintegrasiModel->countAllResults();

        $data = [
            'operator_data_ptsp' => $operator_data_ptsp,
            'total_kendaraan_ptsp' => $total_kendaraan_ptsp,
            'jumlah_operator_ptsp' => count($kendaraan),
            'jenis_kendaraan_ptsp_data' => $jenis_kendaaraan_ptsp_data,
            'kode_trayek_reguler' => $trayek_reguler,

            'operator_2014' => $operator_2014,
            'total_kendaraan_2014' => $total_db_2014,
            'jumlah_operator_2014' => count($kendaraan_2014),
            'jenis_kendaraan_2014' => $jenis_kendaaraan_2014_data,
            'trayek' => $trayek,

            'operator_terintegrasi' => $operator_terintegrasi,
            'total_kendaraan_terintegrasi' => $total_kendaraan_terintegrasi,
            'jumlah_operator_terintegrasi' => count($kendaraan_terintegrasi),
            'jenis_kendaraan_terintegrasi' => $jenis_kendaaraan_terintegrasi,

            'total_semua_operator' => count($kendaraan) + count($kendaraan_2014) + count($kendaraan_terintegrasi),
            'total_semua_kendaraan' => $total_kendaraan_ptsp + $total_db_2014 + $total_kendaraan_terintegrasi

        ];
        // return view('welcome_message');
        return view('database_kendaraan', $data);
    }
}

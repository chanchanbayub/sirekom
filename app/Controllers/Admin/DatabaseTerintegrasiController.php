<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseTerintegrasiModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DatabaseTerintegrasiController extends BaseController
{
    protected $dataBaseTerintegrasiModel;
    protected $importExcel;
    protected $validation;


    public function __construct()
    {
        $this->dataBaseTerintegrasiModel = new DatabaseTerintegrasiModel();
        // $this->kendaraanModel = new KendaraanModel();
        // $this->client = \Config\Services::curlrequest();
        // $this->fetchModel = new FetchModel();

        // // $this->client = service('curlrequest');

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $operator_data = [];
        $kendaraan = $this->dataBaseTerintegrasiModel->getDataKendaraanTerintegrasi();
        // dd($kendaraan);

        foreach ($kendaraan as $data_operator) {

            $jmlh_kendaraan = $this->dataBaseTerintegrasiModel->getDataKendaraanTerintegrasiWhereOperator($data_operator->operator_kendaraan);

            $operator_data[] = [
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }

        $total_kendaraan = $this->dataBaseTerintegrasiModel->countAllResults();


        $data = [
            'title' => 'Database Kendaraan Terintegrasi',
            'kendaraan_data' => $operator_data,
            'total_kendaraan' => $total_kendaraan
        ];

        return view('backoffice/database_kendaraan_terintegrasi_v', $data);
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([

                'data_kendaraan' => [
                    'rules' => 'uploaded[data_kendaraan]|max_size[data_kendaraan,5048]|mime_in[data_kendaraan,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv]',
                    'errors' => [
                        'uploaded' => 'Tidak Boleh Kosong !',
                        'max_size' => 'Ukuran Terlalu Besar (max : 5MB) !',
                        'mime_in' => 'yang anda upload bukan Excel',
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'data_kendaraan' => $this->validation->getError('data_kendaraan'),
                    ]
                ];
            } else {

                $this->importExcel = new Spreadsheet();

                $data_kendaraan = $this->request->getFile('data_kendaraan');

                $ext = $data_kendaraan->getClientExtension();

                if ($ext == 'xls') {
                    $this->importExcel = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $this->importExcel = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }

                $excel = $this->importExcel->load($data_kendaraan);
                $sheet = $excel->getActiveSheet()->toArray();

                foreach ($sheet as $key => $value) {
                    if ($key == 0) {
                        continue;
                    }

                    $data_terintegrasi = $this->dataBaseTerintegrasiModel->where(["nomor_kendaraan" => $value['1']])->first();

                    if ($data_terintegrasi != null) {
                        continue;
                    }

                    $this->dataBaseTerintegrasiModel->save([
                        'kode_kontrak' => $value['0'],
                        'nomor_kendaraan' => $value['1'],
                        'operator' => $value['2'],
                        'kode_trayek' => $value['3'],
                        'trayek_lama' => $value['4'],
                        'no_body' => $value['5'],
                        'pemilik' => $value['6'],
                        'merk' => $value['7'],
                        'jenis_kendaraan' => $value['8'],
                        'chasis' => $value['9'],
                        'mesin' => $value['10'],
                        'tahun_pembuatan' => $value['11'],
                        'tahun_registrasi' => $value['12'],
                        'tipe_kendaraan' => $value['13'],

                    ]);
                }
            }


            $alert = [
                'success' => 'Kendaraan Terintegrasi Berhasil di Simpan!',
            ];
        }
        return json_encode($alert);
    }

    public function view($nama_operator)
    {

        $data = [
            'title' => 'Data Kendaraan Terintegrasi Berdasarkan Operator Kendaraan',
            'send_data' => urldecode($nama_operator)

        ];

        return view('backoffice/detail_kendaraan_integrasi_v', $data);
    }

    public function getKendaraanDataTable($nama_operator)
    {
        if ($this->request->isAjax()) {
            // dd($nama_operator);
            $data_kendaraan = $this->dataBaseTerintegrasiModel->getDataKendaraanTable($nama_operator);
            // dd($data_kendaraan);

            return DataTable::of($data_kendaraan)
                ->setSearchableColumns(['nomor_kendaraan',  'operator', 'merk'])
                ->addNumbering('nomor')->toJson(true);
        }
    }
}

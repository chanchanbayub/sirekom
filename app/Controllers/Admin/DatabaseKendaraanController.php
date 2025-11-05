<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseKendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class DatabaseKendaraanController extends BaseController
{
    protected $dataBaseKendaraanModel;
    protected $importExcel;
    protected $validation;


    public function __construct()
    {
        $this->dataBaseKendaraanModel = new DatabaseKendaraanModel();
        // $this->kendaraanModel = new KendaraanModel();
        // $this->client = \Config\Services::curlrequest();
        // $this->fetchModel = new FetchModel();

        // // $this->client = service('curlrequest');

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $operator_data = [];
        $kendaraan = $this->dataBaseKendaraanModel->getDataKendaraan2014();
        // dd($kendaraan);

        foreach ($kendaraan as $data_operator) {

            $jmlh_kendaraan = $this->dataBaseKendaraanModel->getDataKendaraan2014WhereOperator($data_operator->operator_kendaraan);

            $operator_data[] = [
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }

        $total_kendaraan = $this->dataBaseKendaraanModel->countAllResults();


        $data = [
            'title' => 'Database Kendaraan',
            'kendaraan_data' => $operator_data,
            'total_kendaraan' => $total_kendaraan
        ];

        return view('backoffice/database_kendaraan_2014_v', $data);
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

                    $this->dataBaseKendaraanModel->save([
                        'nomor_kendaraan' => $value['0'],
                        'no_uji_kendaraan' => $value['1'],
                        'kode_trayek' => $value['2'],
                        'trayek' => $value['3'],
                        'operator' => $value['4'],
                        'alamat' => $value['5'],
                        'tahun' => $value['6'],
                        'merk' => $value['7'],
                        'jenis_kendaraan' => $value['8'],
                        'awal_masa_berlaku' => $value['9'],
                        'habis_masa_berlaku' => $value['10'],
                        'tanggal_penerbitan' => $value['11'],

                    ]);
                }
            }


            $alert = [
                'success' => 'Database Kendaraan 2014 Berhasil di Simpan!',
                // 'data' => $excel_valid,
                // 'kir' => $response_kendaraan
            ];
        }
        return json_encode($alert);
    }

    public function view($nama_operator)
    {

        $data = [
            'title' => 'Data Kendaraan Berdasarkan Operator Kendaraan',
            'send_data' => urldecode($nama_operator)

        ];

        return view('backoffice/detail_kendaraan_2014_v', $data);
    }

    public function getKendaraanDataTable($nama_operator)
    {
        if ($this->request->isAjax()) {
            $data_kendaraan = $this->dataBaseKendaraanModel->getDataKendaraanTable($nama_operator);

            return DataTable::of($data_kendaraan)
                ->setSearchableColumns(['nomor_kendaraan',  'operator', 'merk', 'no_uji_kendaraan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }
}

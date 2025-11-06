<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\FetchModel;
use App\Models\Admin\KendaraanModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class KendaraanController extends BaseController
{
    protected $kendaraanModel;
    protected $importExcel;
    protected $validation;
    protected $fetchModel;
    protected $client;

    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
        $this->client = \Config\Services::curlrequest();
        $this->fetchModel = new FetchModel();

        // $this->client = service('curlrequest');

        $this->validation = \Config\Services::validation();
    }

    public function index()
    {

        $operator_data = [];
        $kendaraan = $this->kendaraanModel->getDataKendaraan();

        foreach ($kendaraan as $data_operator) {

            $jmlh_kendaraan = $this->kendaraanModel->getDataKendaraanWhereOperator($data_operator->operator_kendaraan);

            $operator_data[] = [
                // 'id' => $data_operator->id,
                'operator_kendaraan' => $data_operator->operator_kendaraan,
                'jumlah_kendaraan' => count($jmlh_kendaraan)
            ];
        }

        $total_kendaraan = $this->kendaraanModel->countAllResults();

        // dd($total_kendaraan);

        $data = [
            'title' => 'Database Kendaraan',
            'kendaraan_data' => $operator_data,
            'total_kendaraan' => $total_kendaraan
        ];

        return view('backoffice/data_base_kendaraan_v', $data);
    }

    public function view($nama_operator)
    {

        // $nama_operator_data = rtrim(base64_encode($nama_operator), '=');
        // dd(base64_decode($nama_operator_data));

        $data = [
            'title' => 'Data Kendaraan Berdasarkan Operator Kendaraan',
            'send_data' => urldecode($nama_operator)

        ];

        return view('backoffice/detail_kendaraan_v', $data);
    }

    public function getKendaraanDataTable($nama_operator)
    {
        if ($this->request->isAjax()) {

            // dd($nama_operator);

            $nama_operator_data = base64_decode($nama_operator);

            $data_kendaraan = $this->kendaraanModel->getDataKendaraanTable($nama_operator_data);
            // dd($data_kendaraan);
            return DataTable::of($data_kendaraan)
                // ->add('action', function ($row) {
                //     return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button">
                //                                     <i class="ti ti-eye"></i>
                //                                 </button>';
                // })
                ->setSearchableColumns(['nomor_kendaraan',  'operator', 'merk', 'nomor_uji'])
                ->addNumbering('nomor')->toJson(true);
        }
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

                    $kendaraan = $this->fetchModel->FetchModel($value['0']);

                    $getNopol = $this->kendaraanModel->where(["nomor_kendaraan" => $value["0"]])->first();

                    if ($getNopol == null) {
                        if ($kendaraan["message"] == "Success") {
                            $this->kendaraanModel->save([
                                'nomor_kendaraan' => $kendaraan["data"]["nopol"],
                                'kode_kontrak' => $value['1'],
                                'jenis_kendaraan' => $value['2'],
                                'merk' => $kendaraan["data"]["merk"],
                                'nomor_body' => $value['4'],
                                'nomor_rangka' => $kendaraan["data"]["chasis"],
                                'nomor_mesin' => $kendaraan["data"]["mesin"],
                                'tahun_pembuatan' =>  $kendaraan["data"]["tahun_buat"],
                                'tahun_registrasi' => $value['8'],
                                'nomor_uji' => $kendaraan["data"]["nouji"],
                                'tipe_kendaraan' => $value['10'],
                                'operator' => $value['11'],
                                'alamat_perusahaan' => $value['12'],
                                'nama_pemilik' => $value['13'],
                                'kode_trayek_reguler' => $value['14'],
                                'kode_trayek_tj' => $value['15'],
                                'rute' => $value['16'],
                                'awal_masa_berlaku_kp' => $value['17'],
                                'habis_masa_berlaku_kp' => $value['18'],
                                'nomor_sk' => $value['19'],
                                'tanggal_penerbitan' => $value['20'],
                                'status_integrasi' => $value['21'],
                                'jenis_perizinan' => $value['22'],
                                'tgl_berlaku_uji' => $kendaraan["data"]["tgl_berlaku_uji"]
                            ]);
                        }
                    }
                }
            }


            $alert = [
                'success' => 'Database Kendaraan Berhasil di Simpan!',
                // 'data' => $excel_valid,
                // 'kir' => $response_kendaraan
            ];
        }
        return json_encode($alert);
    }
}

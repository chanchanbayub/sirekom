<?php

namespace App\Controllers\Operator;

use App\Controllers\BaseController;
use App\Models\Admin\DatabaseKendaraanModel;
use App\Models\Admin\DatabaseTerintegrasiModel;
use App\Models\Admin\FetchModel;
use App\Models\Admin\JenisPerizinanModel;
use App\Models\Admin\PengajuanKendaraanModel;
use App\Models\Admin\PengantarPerizinanModel;
use App\Models\Admin\StatusPerizinanModel;
use App\Models\Admin\ValidasiRekomModel;
use App\Models\Operator\KendaraanModel;
use App\Models\Operator\PengajuanRekomendasiModel;
use App\Models\Operator\ProfilUsersModel;
use App\Models\Operator\UsersManagementModel;
use CodeIgniter\HTTP\ResponseInterface;
use DateTime;
use Hermawan\DataTables\DataTable;

class PengajuanRekomendasiController extends BaseController
{
    protected $usersManagementModel;
    protected $pengantarPerizinanModel;
    protected $jenisPerizinanModel;
    protected $statusPerizinanModel;
    protected $validation;
    protected $importExcel;
    protected $kendaraanModel;
    protected $pengajuanRekomendasiModel;
    protected $profilUsersModel;
    protected $validasiRekomModel;
    protected $client;
    protected $dateTime;
    protected $fetchModel;
    protected $pengajuanKendaraanModel;
    protected $databaseKendaraanModel;
    protected $databaseTerintegrasiModel;

    public function __construct()
    {
        $this->pengantarPerizinanModel = new PengantarPerizinanModel();
        $this->jenisPerizinanModel = new JenisPerizinanModel();
        $this->usersManagementModel = new UsersManagementModel();
        $this->statusPerizinanModel = new StatusPerizinanModel();
        $this->validation = \Config\Services::validation();
        $this->kendaraanModel = new KendaraanModel();
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
        $this->importExcel = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        $this->profilUsersModel = new ProfilUsersModel();
        $this->client = \Config\Services::curlrequest();
        $this->validasiRekomModel = new ValidasiRekomModel();
        $this->dateTime = new DateTime();
        $this->fetchModel = new FetchModel();
        $this->pengajuanKendaraanModel = new PengajuanKendaraanModel();
        $this->databaseKendaraanModel = new DatabaseKendaraanModel();
        $this->databaseTerintegrasiModel = new DatabaseTerintegrasiModel();
    }

    public function index()
    {

        $data = [
            'title' => 'Pengajuan Surat Rekomendasi',
            'status_perizinan' => $this->statusPerizinanModel->getStatusPerizinan()
        ];

        return view('operator/pengajuan_rekomendasi_v', $data);
    }

    public function getPengajuanRekom()
    {
        if ($this->request->isAjax()) {

            $id = session()->get('id');

            $rekom_pengajuan = $this->pengajuanRekomendasiModel->getPengajuanRekom($id);

            return DataTable::of($rekom_pengajuan)
                ->add('action', function ($row) {
                    return '<button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '" type="button"> <i class="ti ti-pencil"></i>
                            </button>
                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button"> <i class="ti ti-trash"></i>
                            </button>
                            ';
                })
                ->add('status_perizinan', function ($row) {
                    return '<button type="button" class="btn btn-sm btn-info"> ' . $row->status_perizinan .  '</button>';
                })
                ->add('view', function ($row) {
                    return '<a href ="/operator/pengajuan_rekom/detail/' . base64_encode($row->id) . '/'  . base64_encode($row->id) . '/ " class="btn btn-sm btn-outline-primary" >
                                                    <i class="ti ti-files"></i> Lihat
                                                </a>';
                })
                ->setSearchableColumns(['pengantar_perizinan_table.surat_pengantar', 'jenis_perizinan_table.jenis_perizinan'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function form_pengajuan_rekomendasi()
    {

        $users_id = session()->get('id');

        $data = [
            'title' => 'Formulir Pengajuan Rekomendasi',
            'surat_pengantar' => $this->pengantarPerizinanModel->getSuratPengantar(),
            'users_management' => $this->usersManagementModel->getUsersManagement($users_id),
            'status_perizinan' => $this->statusPerizinanModel->where(["id" => 1])->get()->getRowObject()
        ];

        return view('operator/form_pengajuan_rekom_v', $data);
    }

    public function detail($id, $id_pengajuan_rekom)
    {
        $pengajuan_rekom = $this->pengajuanRekomendasiModel->getPengajuanRekomWhereId(base64_decode($id));


        // dd($pengajuan_rekom);

        if ($pengajuan_rekom == null) {
            return redirect()->back();
        }

        $data_kendaraan = $this->pengajuanKendaraanModel->getIdPengajuanRekom(base64_decode($id_pengajuan_rekom));

        if ($data_kendaraan == null) {
            return redirect()->back();
        }

        $terdaftar_ptsp = [];
        $tidak_terdaftar_ptsp = [];

        $kendaraan_berlaku = [];
        $kendaraan_tidak_berlaku = [];

        $tanggal_hari_ini = date('Y-m-d');

        if ($pengajuan_rekom->surat_pengantar_id == 1) {
            if ($pengajuan_rekom->jenis_perizinan_id == 1) {
                foreach ($data_kendaraan as $kendaraan) {
                    $validasi_cek_kir = $this->fetchModel->FetchModel($kendaraan->nomor_kendaraan);
                    if ($validasi_cek_kir["message"] == "Success") {
                        $tanggal_masa_berlaku = $validasi_cek_kir["data"]["tgl_berlaku_uji"];

                        $bulan = [
                            'Januari' => '01',
                            'Februari' => '02',
                            'Maret' => '03',
                            'April' => '04',
                            'Mei' => '05',
                            'Juni' => '06',
                            'Juli' => '07',
                            'Agustus' => '08',
                            'September' => '09',
                            'Oktober' => '10',
                            'November' => '11',
                            'Desember' => '12'
                        ];

                        $tanggal = preg_replace('/^[^,]+, /', '', $tanggal_masa_berlaku); // hasil: "10 Oktober 2025"
                        list($hari, $namaBulan, $tahun) = explode(' ', $tanggal);

                        $formatDate = "$tahun-{$bulan[$namaBulan]}-$hari";

                        $api_data_kendaraan[] = [
                            'id_pengajuan_rekom' => $kendaraan->id_pengajuan_rekom,
                            'id' => $kendaraan->id,
                            'kode_trayek' => $kendaraan->kode_trayek,
                            'nomor_kendaraan' => $kendaraan->nomor_kendaraan,
                            'merk_kendaraan' => $validasi_cek_kir["data"]["merk"],
                            'tahun' => $validasi_cek_kir["data"]["tahun_buat"],
                            'nama' => $validasi_cek_kir["data"]["nama"],
                            'nouji_cek_kir' => $validasi_cek_kir["data"]["nouji"],
                            'nouji_upload' => $kendaraan->nouji,
                            'chasis' => $validasi_cek_kir["data"]["chasis"],
                            'mesin' => $validasi_cek_kir["data"]["mesin"],
                            'lokasi_uji' => $validasi_cek_kir["data"]["lokasi_uji"],
                            'tgl_berlaku_uji' => $validasi_cek_kir["data"]["tgl_berlaku_uji"],
                            'perbandingan' => $formatDate
                        ];

                        if ($formatDate > $tanggal_hari_ini) {
                            $kendaraan_berlaku[] = [
                                'id_pengajuan_rekom' => $kendaraan->id_pengajuan_rekom,
                                'id' => $kendaraan->id,
                                'nomor_kendaraan' => $validasi_cek_kir["data"]["nopol"],
                                'tgl_berlaku_uji' => $validasi_cek_kir["data"]["tgl_berlaku_uji"]
                            ];
                        }
                        if ($formatDate < $tanggal_hari_ini) {
                            $kendaraan_tidak_berlaku[] = [
                                'id_pengajuan_rekom' => $kendaraan->id_pengajuan_rekom,
                                'id' => $kendaraan->id,
                                'nomor_kendaraan' => $validasi_cek_kir["data"]["nopol"],
                                'tgl_berlaku_uji' => $validasi_cek_kir["data"]["tgl_berlaku_uji"]
                            ];
                        }
                    }
                }

                foreach ($api_data_kendaraan as $data_kr) {
                    $data_ptsp = $this->kendaraanModel->getRowKendaraan($data_kr["nomor_kendaraan"]);
                    $ptsp = (object) $data_ptsp;
                    if ($data_ptsp != null) {
                        $terdaftar_ptsp[] = [
                            'id' => $ptsp->id,
                            'nomor_kendaraan' => $ptsp->nomor_kendaraan,
                            'kode_trayek' => $ptsp->kode_trayek_reguler,
                            'merk_kendaraan_sebelumnya' => $ptsp->merk,
                            'merk_kendaraan_cek_kir' => $data_kr["merk_kendaraan"],
                            'nomor_uji_sebelumnya' => $ptsp->nomor_uji,
                            'nomor_uji_cek_kir' => $data_kr["nouji_cek_kir"],
                            'nomor_rangka_sebelumnya' => $ptsp->nomor_rangka,
                            'nomor_rangka_cek_kir' => $data_kr["chasis"],
                            'nomor_mesin_sebelumnya' => $ptsp->nomor_mesin,
                            'nomor_mesin_cek_kir' => $data_kr["mesin"],
                            'tahun_pembuatan_sebelumnya' => $ptsp->tahun_pembuatan,
                            'tahun_pembuatan_cek_kir' => $data_kr["tahun"],
                            'tgl_berlaku_uji' => $data_kr["tgl_berlaku_uji"],
                            'perbandingan' => $data_kr["perbandingan"]
                        ];
                    } else {
                        $tidak_terdaftar_ptsp[] = [
                            'nomor_kendaraan' => $data_kr["nomor_kendaraan"],
                            'kode_trayek' => $data_kr["kode_trayek"],
                            'merk' => $data_kr["merk_kendaraan"],
                            'nomor_uji_cek_kir' => $data_kr["nouji_cek_kir"],
                            'nomor_rangka_cek_kir' => $data_kr["chasis"],
                            'nomor_mesin_cek_kir' => $data_kr["mesin"],
                            'tahun_pembuatan_cek_kir' => $data_kr["tahun"],
                            'tgl_berlaku_uji' => $data_kr["tgl_berlaku_uji"],
                            'perbandingan' => $data_kr["perbandingan"]
                        ];
                    }
                }

                foreach ($terdaftar_ptsp as $perbaikan_data) {
                    $data_ptsp = $this->kendaraanModel->getRowKendaraan($perbaikan_data["nomor_kendaraan"]);

                    if ($data_ptsp["merk"] != $perbaikan_data["merk_kendaraan_cek_kir"]) {
                        $this->kendaraanModel->update($id, [
                            'merk' => $perbaikan_data["merk_kendaraan_cek_kir"]
                        ]);
                    }
                }
            }

            $data = [
                'title' => 'Pengajuan Perbaikan Data',
                'jumlah_pengajuan' => count($data_kendaraan),
                'terdaftar_ptsp' => $terdaftar_ptsp,
                'tidak_terdaftar_ptsp' => $tidak_terdaftar_ptsp,
                'pengajuan_rekom' => $pengajuan_rekom,
                'users_management' => $this->profilUsersModel->getProfilUsersWhereUsersId($pengajuan_rekom->users_id),
                'tanggal_hari_ini' => $tanggal_hari_ini,
                'kendaraan_berlaku' => $kendaraan_berlaku,
                'kendaraan_tidak_berlaku' => $kendaraan_tidak_berlaku
            ];

            return view('operator/detail_pengajuan_rekom_perbaikan_v', $data);
        }
    }

    public function getJenisPerizinan()
    {
        if ($this->request->isAJAX()) {

            $surat_pengantar_id = $this->request->getVar('surat_pengantar_id');

            $jenis_perizinan = $this->jenisPerizinanModel->where(["surat_pengantar_id" => $surat_pengantar_id])->get()->getResultObject();

            return json_encode($jenis_perizinan);
        }
    }

    public function getUsers()
    {
        if ($this->request->isAJAX()) {

            $users_id = $this->request->getVar('users_id');

            // $users_management = $this->profilUsersModel->where(["users_id" => $users_id])->get()->getRowObject();

            $users_management = $this->profilUsersModel->getProfilUsersWhereUsersId($users_id);

            return json_encode($users_management);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'surat_pengantar_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'jenis_perizinan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'users_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'dokumen_surat_pengantar' => [
                    'rules' => 'uploaded[dokumen_surat_pengantar]|max_size[dokumen_surat_pengantar,5048]|mime_in[dokumen_surat_pengantar,application/pdf]',
                    'errors' => [
                        'uploaded' => 'Tidak Boleh Kosong !',
                        'max_size' => 'Ukuran Terlalu Besar (max : 5MB) !',
                        'mime_in' => 'yang anda upload bukan PDF',
                    ]
                ],
                'dokumen_nomor_kendaraan' => [
                    'rules' => 'uploaded[dokumen_nomor_kendaraan]|max_size[dokumen_nomor_kendaraan,5048]|mime_in[dokumen_nomor_kendaraan,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,text/csv]',
                    'errors' => [
                        'uploaded' => 'Tidak Boleh Kosong !',
                        'max_size' => 'Ukuran Terlalu Besar (max : 5MB) !',
                        'mime_in' => 'yang anda upload bukan Excel',
                    ]
                ],
                'dokumen_lainnya' => [
                    'rules' => 'uploaded[dokumen_lainnya]|max_size[dokumen_lainnya,5048]|mime_in[dokumen_lainnya,application/pdf]',
                    'errors' => [
                        'uploaded' => 'Tidak Boleh Kosong !',
                        'max_size' => 'Ukuran Terlalu Besar (max : 5MB) !',
                        'mime_in' => 'yang anda upload bukan PDF',
                    ]
                ],
                'status_perizinan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'surat_pengantar_id' => $this->validation->getError('surat_pengantar_id'),
                        'jenis_perizinan_id' => $this->validation->getError('jenis_perizinan_id'),
                        'users_id' => $this->validation->getError('users_id'),
                        'dokumen_surat_pengantar' => $this->validation->getError('dokumen_surat_pengantar'),
                        'dokumen_nomor_kendaraan' => $this->validation->getError('dokumen_nomor_kendaraan'),
                        'dokumen_lainnya' => $this->validation->getError('dokumen_lainnya'),
                        'tanggal_pengajuan' => $this->validation->getError('tanggal_pengajuan'),
                        'status_perizinan_id' => $this->validation->getError('status_perizinan_id'),
                    ]
                ];
            } else {

                $surat_pengantar_id = $this->request->getPost('surat_pengantar_id');
                $jenis_perizinan_id = $this->request->getPost('jenis_perizinan_id');
                $users_id = $this->request->getVar('users_id');

                $dokumen_surat_pengantar = $this->request->getFile('dokumen_surat_pengantar');
                $nama_surat_pengantar = $dokumen_surat_pengantar->getRandomName();

                $dokumen_lainnya = $this->request->getFile('dokumen_lainnya');
                $nama_dokumen_lainnya = $dokumen_lainnya->getRandomName();

                $tanggal_pengajuan = $this->request->getVar('tanggal_pengajuan');
                $status_perizinan_id = $this->request->getPost('status_perizinan_id');

                $noPengajuanRekom = $this->pengajuanRekomendasiModel->getNomorPengajuanRekom();

                if ($noPengajuanRekom == null) {
                    $getRandomNumber = "SIREKOM-00" . 1;
                } else {
                    $getRandomNumber = "SIREKOM-00" . 2;
                }

                $this->pengajuanRekomendasiModel->save([
                    'noPengajuanRekom' => $getRandomNumber,
                    'surat_pengantar_id' => $surat_pengantar_id,
                    'jenis_perizinan_id' => $jenis_perizinan_id,
                    'users_id' => $users_id,
                    'dokumen_surat_pengantar' => $nama_surat_pengantar,
                    'dokumen_lainnya' => $nama_dokumen_lainnya,
                    'tanggal_pengajuan' => $tanggal_pengajuan,
                    'status_perizinan_id' => $status_perizinan_id,
                ]);


                // Input Data Kendaraan Table
                $pengajuan_rekom = $this->pengajuanRekomendasiModel->getId();

                $dokumen_nomor_kendaraan = $this->request->getFile('dokumen_nomor_kendaraan');
                $ext = $dokumen_nomor_kendaraan->getClientExtension();

                if ($ext == 'xls') {
                    $this->importExcel = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
                } else {
                    $this->importExcel = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                }


                $excel = $this->importExcel->load($dokumen_nomor_kendaraan);
                $sheet = $excel->getActiveSheet()->toArray();

                foreach ($sheet as $key => $value) {
                    if ($key == 0) {
                        continue;
                    }
                    $excel_data = [
                        'id_pengajuan_rekom' => $pengajuan_rekom->id,
                        'users_id' => $users_id,
                        'kode_trayek' => $value['0'],
                        'nomor_kendaraan' => $value["1"],
                        'nouji' => $value["2"],
                        'merk' => $value["3"],
                        'tahun_pembuatan' => $value["4"],
                        'operator' => $value["5"],
                        'tanggal_pengajuan' => $tanggal_pengajuan,
                    ];

                    if (count($excel_data) <= 5) {
                        $alert = [
                            'ditolak' => 'Data Kendaraan yang di Upload Minimal 5 (lima) Kendaraan'
                        ];
                    } else {
                        $this->pengajuanKendaraanModel->save($excel_data);
                    }
                }

                $dokumen_surat_pengantar->move('surat_pengantar', $nama_surat_pengantar);
                $dokumen_lainnya->move('dokumen_lainnya', $nama_dokumen_lainnya);


                $alert = [
                    'success' => 'Rekomendasi Berhasil di Ajukan!'
                ];
            }
            return json_encode($alert);
        }
    }


    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pengajuan_rekom = $this->pengajuanRekomendasiModel->where(["id" => $id])->first();
            $status_perizinan = $this->statusPerizinanModel->getStatusPerizinan();

            $data = [
                'pengajuan_rekom' => $pengajuan_rekom,
                'status_perizinan' => $status_perizinan
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $pengajuan_rekom = $this->pengajuanRekomendasiModel->where(["id" => $id])->first();
            $pengajuan_kendaraan = $this->pengajuanKendaraanModel->where(["id_pengajuan_rekom" => $id])->first();

            $path_dokumen = 'dokumen_lainnya/' . $pengajuan_rekom['dokumen_lainnya'];
            $path_dokumen_surat_pengantar = 'surat_pengantar/' . $pengajuan_rekom['dokumen_surat_pengantar'];

            $this->pengajuanRekomendasiModel->delete($pengajuan_rekom["id"]);

            if ($pengajuan_kendaraan != null) {
                $this->pengajuanKendaraanModel->delete($pengajuan_kendaraan["id"]);
            }

            $alert = [
                'success' => 'Kode Trayek Kendaraan Berhasil di Hapus !'
            ];

            if ($pengajuan_rekom['dokumen_lainnya'] != null || $pengajuan_rekom['dokumen_surat_pengantar'] != null) {
                if (file_exists($path_dokumen) || file_exists($path_dokumen_surat_pengantar)) {
                    unlink($path_dokumen);
                    unlink($path_dokumen_surat_pengantar);
                }
            }

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'status_perizinan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Status Perizinan Tidak Boleh Kosong !'
                    ]
                ],

            ])) {
                $alert = [
                    'error' => [
                        'status_perizinan_id' => $this->validation->getError('status_perizinan_id'),
                    ]
                ];
            } else {

                $id = $this->request->getPost('id');
                $status_perizinan_id = $this->request->getPost('status_perizinan_id');


                $this->pengajuanRekomendasiModel->update($id, [
                    'status_perizinan_id' => $status_perizinan_id,

                ]);

                $alert = [
                    'success' => 'Status Berhasil di Ubah !'
                ];
            }

            return json_encode($alert);
        }
    }
}

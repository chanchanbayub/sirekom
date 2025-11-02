<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengajuanRekomendasiModel;
use App\Models\Admin\StatusPerizinanModel;
use App\Models\Admin\SuratRekomendasiModel;
use CodeIgniter\HTTP\ResponseInterface;
use Hermawan\DataTables\DataTable;
use PhpOffice\Math\Element\Row;

class SuratRekomendasiController extends BaseController
{
    protected $suratRekomendasiModel;
    protected $pengajuanRekomendasiModel;
    protected $statusPerizinanModel;
    protected $validation;

    public function __construct()
    {
        $this->suratRekomendasiModel = new SuratRekomendasiModel();
        $this->pengajuanRekomendasiModel = new PengajuanRekomendasiModel();
        $this->statusPerizinanModel = new StatusPerizinanModel();
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        $status_perizinan = $this->statusPerizinanModel->where(["id" =>  4])->orWhere(["id" => 5])->get()->getResultObject();


        $data = [
            'title' => 'Surat Rekomendasi',
            'status_perizinan' => $status_perizinan,
            'pengajuan_rekomendasi' => $this->pengajuanRekomendasiModel->getPengajuanRekomendasi()
        ];

        return view('backoffice/surat_rekomendasi_v', $data);
    }

    public function getSurat()
    {
        if ($this->request->isAjax()) {
            $surat_rekomendasi = $this->suratRekomendasiModel->getSurat();

            return DataTable::of($surat_rekomendasi)
                ->add('action', function ($row) {
                    return '
                    <button class="btn btn-sm btn-outline-warning" id="edit" data-bs-toggle="modal" data-bs-target="#editModal" data-id="' .  $row->id . '"             type="button"><i class="ti ti-pencil"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger" id="delete" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="' .  $row->id . '" type="button"><i class="ti ti-trash"></i>
                    </button>';
                })
                ->add('surat_rekom', function ($row) {
                    return '<a href="../rekomendasi/' .  $row->surat_rekomendasi . '" class="btn btn-sm btn-outline-success" target="_blank">
                            <i class="ti ti-file"></i> Download </a>';
                })
                ->add('status', function ($row) {
                    if ($row->status_perizinan_id == 4) {
                        return '<span class="badge text-bg-success">' . $row->status_perizinan . '</span>';
                    } else {
                        return '<span class="badge text-bg-danger">' . $row->status_perizinan . '</span>';;
                    }
                })
                ->setSearchableColumns(['tanggal_surat'])
                ->addNumbering('nomor')->toJson(true);
        }
    }

    public function insert()
    {
        if ($this->request->isAJAX()) {

            if (!$this->validate([
                'pengajuan_id' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'tanggal_surat' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Tidak Boleh Kosong !'
                    ]
                ],
                'surat_rekomendasi' => [
                    'rules' => 'uploaded[surat_rekomendasi]|max_size[surat_rekomendasi,5048]|mime_in[surat_rekomendasi,application/pdf]',
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
                        'pengajuan_id' => $this->validation->getError('pengajuan_id'),
                        'tanggal_surat' => $this->validation->getError('tanggal_surat'),
                        'surat_rekomendasi' => $this->validation->getError('surat_rekomendasi'),
                        'status_perizinan_id' => $this->validation->getError('status_perizinan_id'),
                    ]
                ];
            } else {

                $pengajuan_id = $this->request->getVar('pengajuan_id');
                $tanggal_surat = $this->request->getVar('tanggal_surat');
                $surat_rekomendasi = $this->request->getFile('surat_rekomendasi');
                $status_perizinan = $this->request->getVar('status_perizinan_id');

                $nama_surat_rekom = $surat_rekomendasi->getRandomName();

                $this->suratRekomendasiModel->save([
                    'pengajuan_id' => strtolower($pengajuan_id),
                    'tanggal_surat' => strtolower($tanggal_surat),
                    'surat_rekomendasi' => $nama_surat_rekom,
                ]);

                $surat_rekomendasi->move('rekomendasi', $nama_surat_rekom);

                $this->pengajuanRekomendasiModel->update($pengajuan_id, [
                    'status_perizinan_id' => $status_perizinan
                ]);

                $alert = [
                    'success' => 'Surat Rekomendasi Berhasil di Simpan !'
                ];
            }

            return json_encode($alert);
        }
    }

    public function edit()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $status_perizinan = $this->statusPerizinanModel->where(["id" =>  4])->orWhere(["id" => 5])->get()->getResultObject();

            $surat_rekomendasi = $this->suratRekomendasiModel->getSuratRekomendasiWhereId($id);

            $pengajuan_rekom_data = $this->pengajuanRekomendasiModel->where(["id" => $surat_rekomendasi->pengajuan_id])->first();

            $data = [
                'surat_rekomendasi' => $surat_rekomendasi,
                'status_perizinan' => $status_perizinan,
                'pengajuan_rekomendasi' => $this->pengajuanRekomendasiModel->getPengajuanRekomendasiEdit(),
                'pengajuan_rekom_data' => $pengajuan_rekom_data
            ];

            return json_encode($data);
        }
    }

    public function delete()
    {
        if ($this->request->isAJAX()) {

            $id = $this->request->getVar('id');

            $surat_rekomendasi = $this->suratRekomendasiModel->where(["id" => $id])->first();

            $path_rekom = 'rekomendasi/' . $surat_rekomendasi["surat_rekomendasi"];
            if ($path_rekom != null) {
                if (file_exists($path_rekom)) {
                    unlink($path_rekom);
                }
            }

            $this->pengajuanRekomendasiModel->update($surat_rekomendasi["pengajuan_id"], [
                'status_perizinan_id' => 3
            ]);

            $this->suratRekomendasiModel->delete($surat_rekomendasi["id"]);

            $alert = [
                'success' => 'Surat Rekomendasi Berhasil di Hapus !'
            ];

            return json_encode($alert);
        }
    }

    public function update()
    {
        if ($this->request->isAJAX()) {

            if ($this->request->isAJAX()) {

                if (!$this->validate([
                    'pengajuan_id' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tidak Boleh Kosong !'
                        ]
                    ],
                    'tanggal_surat' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Tidak Boleh Kosong !'
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
                            'pengajuan_id' => $this->validation->getError('pengajuan_id'),
                            'tanggal_surat' => $this->validation->getError('tanggal_surat'),
                            'surat_rekomendasi' => $this->validation->getError('surat_rekomendasi'),
                            'status_perizinan_id' => $this->validation->getError('status_perizinan_id'),
                        ]
                    ];
                } else {
                    $id = $this->request->getVar('id');
                    $surat_rekomendasi_lama = $this->request->getVar('surat_rekomendasi_lama');

                    $pengajuan_id = $this->request->getVar('pengajuan_id');
                    $tanggal_surat = $this->request->getVar('tanggal_surat');
                    $surat_rekomendasi = $this->request->getFile('surat_rekomendasi');
                    $status_perizinan = $this->request->getVar('status_perizinan_id');

                    $path_rekom_lama = 'rekomendasi/' . $surat_rekomendasi_lama;

                    if ($surat_rekomendasi->getError() == 4) {
                        $nama_surat_rekom = $surat_rekomendasi_lama;
                    } else {
                        if ($surat_rekomendasi_lama != null) {
                            if (file_exists($path_rekom_lama)) {
                                unlink($path_rekom_lama);
                            }
                        }
                        $nama_surat_rekom = $surat_rekomendasi->getRandomName();
                        $surat_rekomendasi->move('rekomendasi', $nama_surat_rekom);
                    }

                    $this->suratRekomendasiModel->update($id, [
                        'pengajuan_id' => strtolower($pengajuan_id),
                        'tanggal_surat' => strtolower($tanggal_surat),
                        'surat_rekomendasi' => $nama_surat_rekom,
                    ]);

                    $this->pengajuanRekomendasiModel->update($pengajuan_id, [
                        'status_perizinan_id' => $status_perizinan
                    ]);

                    $alert = [
                        'success' => 'Surat Rekomendasi Berhasil di Ubah !'
                    ];
                }

                return json_encode($alert);
            }
        }
    }
}

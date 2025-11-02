<?php

namespace App\Controllers\Word;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

class WordController extends BaseController
{
    protected $mpdf;

    public function __construct()
    {
        $this->mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [210, 330]]);
    }

    public function index()
    {

        $this->mpdf->showImageErrors = true;

        // helper(['format']);

        // $mitra = $this->pengajarModel->where(["id" => $mitra_pengajar_id])->get()->getRowObject();
        // $peserta = $this->muridModel->where(["id" => $peserta_didik_id])->get()->getRowObject();

        // if ($mitra == null || $peserta == null || $bulan == null) {
        //     return redirect()->back();
        // }

        // $mitra_data = $mitra->id;
        // $peserta_data = $peserta->id;

        // $bulan = $bulan;
        // $tahun = date('Y');

        // dd($bulan);
        // $tahun = 2024;

        // $invoice = $this->presensiModel->getPresensiWithMonth($mitra_data, $bulan, $peserta_data, $tahun);

        // $pengajar = $this->pengajarModel->getMitraPengajarWithId($mitra_data);

        // $harga_perjam = $this->hargaModel->getHargaPerbulanPeserta($peserta_data, $bulan, $tahun);

        // // dd($harga_perjam);

        // $total = count($invoice);

        // $peserta_didik_data = $this->muridModel->where(["id" => $peserta_data])->get()->getRowObject();

        // $jumlah_pertemuan = count($invoice);

        $data = [
            'Rekomendasi' =>  'test',
            // 'mitra_pengajar' => $pengajar,
            // 'peserta_didik' => $peserta_didik_data->nama_lengkap_anak,
            // 'harga' => $harga_perjam,
            // 'jumlah_pertemuan' => $jumlah_pertemuan,
            // 'total' => $total,
        ];

        $html = view('pdf/perbaikan_v', $data);
        $this->mpdf->WriteHTML($html);

        $this->response->setHeader('Content-Type', 'application/pdf');;
        $this->mpdf->output('Surat.pdf', 'I');
    }
}

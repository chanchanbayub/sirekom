<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengajuanKendaraanModel extends Model
{
    protected $table            = 'pengajuan_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pengajuan_rekom', 'users_id', 'kode_trayek', 'nomor_kendaraan', 'nouji', 'merk', 'tahun_pembuatan',  'operator', 'tanggal_pengajuan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getIdPengajuanRekom($id)
    {
        return $this->table($this->table)
            ->select('pengajuan_kendaraan_table.id, pengajuan_kendaraan_table.id_pengajuan_rekom, pengajuan_kendaraan_table.nomor_kendaraan, pengajuan_kendaraan_table.merk, pengajuan_kendaraan_table.kode_trayek, pengajuan_kendaraan_table.tahun_pembuatan, pengajuan_kendaraan_table.tanggal_pengajuan, pengajuan_kendaraan_table.nouji, pengajuan_kendaraan_table.operator')
            // ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            // ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            // ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            // ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            ->where(["$this->table.id_pengajuan_rekom" => $id])
            ->orderBy('pengajuan_kendaraan_table.id desc')->get()->getResultObject();
    }
}

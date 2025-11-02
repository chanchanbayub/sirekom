<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SuratRekomendasiModel extends Model
{
    protected $table            = 'surat_rekomendasi_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['pengajuan_id', 'tanggal_surat', 'surat_rekomendasi'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSuratRekomendasi()
    {
        return $this->table($this->table)
            ->select("surat_rekomendasi_table.id, surat_rekomendasi_table.pengajuan_id, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi")
            ->join('pengajuan_rekomendasi_table', 'pengajuan_rekomendasi_table.id = surat_rekomendasi_table.pengajuan_id')
            ->orderBy('surat_rekomendasi_table.id desc')
            ->get()->getResultObject();
    }

    public function getSurat()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("surat_rekomendasi_table.id, surat_rekomendasi_table.pengajuan_id, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi, pengajuan_rekomendasi_table.noPengajuanRekom,pengajuan_rekomendasi_table.tanggal_pengajuan, profil_users_table.nama_perusahaan, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, pengajuan_rekomendasi_table.status_perizinan_id")
            ->join('pengajuan_rekomendasi_table', 'pengajuan_rekomendasi_table.id = surat_rekomendasi_table.pengajuan_id')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('profil_users_table', 'profil_users_table.users_id = users_management_table.id')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id');
        return $builder->orderBy('surat_rekomendasi_table.id desc');
    }

    public function getSuratRekomendasiWhereId($id)
    {
        return $this->table($this->table)
            ->select("surat_rekomendasi_table.id, surat_rekomendasi_table.pengajuan_id, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi")
            ->join('pengajuan_rekomendasi_table', 'pengajuan_rekomendasi_table.id = surat_rekomendasi_table.pengajuan_id')
            ->where(["$this->table.id" => $id])
            ->orderBy('surat_rekomendasi_table.id desc')
            ->get()->getRowObject();
    }
}

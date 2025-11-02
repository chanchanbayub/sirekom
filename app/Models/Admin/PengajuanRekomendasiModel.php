<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengajuanRekomendasiModel extends Model
{
    protected $table            = 'pengajuan_rekomendasi_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['noPengajuanRekom', 'surat_pengantar_id', 'jenis_perizinan_id', 'users_id', 'dokumen_surat_pengantar', 'dokumen_lainnya', 'tanggal_pengajuan', 'status_perizinan_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getPengajuanRekomendasi()
    {

        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.id, pengajuan_rekomendasi_table.users_id, pengajuan_rekomendasi_table.surat_pengantar_id, pengajuan_rekomendasi_table.jenis_perizinan_id, pengajuan_rekomendasi_table.status_perizinan_id, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, users_management_table.nama_lengkap, pengajuan_rekomendasi_table.noPengajuanRekom, pengajuan_rekomendasi_table.dokumen_surat_pengantar, pengajuan_rekomendasi_table.dokumen_lainnya, pengajuan_rekomendasi_table.tanggal_pengajuan, profil_users_table.nama_perusahaan')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('profil_users_table', 'profil_users_table.users_id = users_management_table.id')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            ->where(["pengajuan_rekomendasi_table.status_perizinan_id" => 3])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getResultObject();
    }

    public function getPengajuanRekomendasiEdit()
    {

        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.id, pengajuan_rekomendasi_table.users_id, pengajuan_rekomendasi_table.surat_pengantar_id, pengajuan_rekomendasi_table.jenis_perizinan_id, pengajuan_rekomendasi_table.status_perizinan_id, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, users_management_table.nama_lengkap, pengajuan_rekomendasi_table.noPengajuanRekom, pengajuan_rekomendasi_table.dokumen_surat_pengantar, pengajuan_rekomendasi_table.dokumen_lainnya, pengajuan_rekomendasi_table.tanggal_pengajuan, profil_users_table.nama_perusahaan')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('profil_users_table', 'profil_users_table.users_id = users_management_table.id')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            ->where(["pengajuan_rekomendasi_table.status_perizinan_id" => 3])
            ->orWhere(["pengajuan_rekomendasi_table.status_perizinan_id" => 4])
            ->orWhere(["pengajuan_rekomendasi_table.status_perizinan_id" => 5])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getResultObject();
    }

    public function getPengajuanRekom()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('pengajuan_rekomendasi_table.id, pengajuan_rekomendasi_table.users_id, pengajuan_rekomendasi_table.surat_pengantar_id, pengajuan_rekomendasi_table.jenis_perizinan_id, pengajuan_rekomendasi_table.status_perizinan_id, pengajuan_rekomendasi_table.tanggal_pengajuan, pengajuan_rekomendasi_table.noPengajuanRekom, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, users_management_table.nama_lengkap, pengajuan_rekomendasi_table.noPengajuanRekom')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id');
        return $builder->orderBy('pengajuan_rekomendasi_table.id desc');
    }

    public function getPengajuanRekomWhereId($id)
    {
        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.id, pengajuan_rekomendasi_table.users_id, pengajuan_rekomendasi_table.surat_pengantar_id, pengajuan_rekomendasi_table.jenis_perizinan_id, pengajuan_rekomendasi_table.status_perizinan_id, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, users_management_table.nama_lengkap, pengajuan_rekomendasi_table.noPengajuanRekom, pengajuan_rekomendasi_table.dokumen_surat_pengantar, pengajuan_rekomendasi_table.dokumen_lainnya, pengajuan_rekomendasi_table.tanggal_pengajuan')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            ->where(["$this->table.id" => $id])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getRowObject();
    }

    public function getNomorPengajuanRekom()
    {
        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.noPengajuanRekom')
            // ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            // ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            // ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            // ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            // ->where(["$this->table.id" => $id])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getRowObject();
    }

    public function getId()
    {
        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.id')
            // ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            // ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            // ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            // ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            // ->where(["$this->table.id" => $id])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getRowObject();
    }

    public function getPengajuanRekomWhereNoPengajuan($noPengajuanRekom)
    {
        return $this->table($this->table)
            ->select('pengajuan_rekomendasi_table.id, pengajuan_rekomendasi_table.users_id, pengajuan_rekomendasi_table.surat_pengantar_id, pengajuan_rekomendasi_table.jenis_perizinan_id, pengajuan_rekomendasi_table.status_perizinan_id, pengantar_perizinan_table.surat_pengantar, jenis_perizinan_table.jenis_perizinan, status_perizinan_table.status_perizinan, users_management_table.nama_lengkap, pengajuan_rekomendasi_table.noPengajuanRekom, pengajuan_rekomendasi_table.dokumen_surat_pengantar, pengajuan_rekomendasi_table.dokumen_lainnya, pengajuan_rekomendasi_table.tanggal_pengajuan, surat_rekomendasi_table.tanggal_surat, surat_rekomendasi_table.surat_rekomendasi')
            ->join('users_management_table', 'users_management_table.id = pengajuan_rekomendasi_table.users_id')
            ->join('surat_rekomendasi_table', 'surat_rekomendasi_table.pengajuan_id = pengajuan_rekomendasi_table.id', 'left')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = pengajuan_rekomendasi_table.surat_pengantar_id')
            ->join('jenis_perizinan_table', 'jenis_perizinan_table.id = pengajuan_rekomendasi_table.jenis_perizinan_id')
            ->join('status_perizinan_table', 'status_perizinan_table.id = pengajuan_rekomendasi_table.status_perizinan_id')
            ->where(["$this->table.noPengajuanRekom" => $noPengajuanRekom])
            ->orderBy('pengajuan_rekomendasi_table.id desc')->get()->getRowObject();
    }
}

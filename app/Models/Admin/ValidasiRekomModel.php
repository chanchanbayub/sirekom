<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ValidasiRekomModel extends Model
{
    protected $table            = 'validasi_rekom_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['id_pengajuan_rekom', 'kendaraan_id', 'validasi_stnk', 'validasi_kir'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataValidasi()
    {
        return $this->table($this->table)
            ->select("validasi_rekom_table.id, validasi_rekom_table.kendaraan_id, validasi_rekom_table.rekom_id, validasi_rekom_table.validasi_stnk, validasi_rekom_table.validasi_kir ")
            // ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = jenis_perizinan_table.surat_pengantar_id')
            ->orderBy('validasi_rekom_table.id desc')
            ->get()->getResultObject();
    }
}

<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KodeKendaraanModel extends Model
{
    protected $table            = 'kode_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_kendaraan_id',  'kode_kendaraan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getKodeKendaraan()
    {
        return $this->table($this->table)
            ->select("kode_kendaraan_table.id, kode_kendaraan_table.jenis_kendaraan_id, kode_kendaraan_table.kode_kendaraan")
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = kode_kendaraan_table.jenis_kendaraan_id')
            ->orderBy('kode_kendaraan_table.id desc')
            ->get()->getResultObject();
    }

    public function getKode()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("kode_kendaraan_table.id, kode_kendaraan_table.jenis_kendaraan_id, kode_kendaraan_table.kode_kendaraan, jenis_kendaraan_table.jenis_kendaraan")
            ->join('jenis_kendaraan_table', 'jenis_kendaraan_table.id = kode_kendaraan_table.jenis_kendaraan_id');
        return $builder->orderBy('kode_kendaraan_table.id desc');
    }
}

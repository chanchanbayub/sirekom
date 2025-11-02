<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class JenisKendaraanModel extends Model
{
    protected $table            = 'jenis_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['jenis_kendaraan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getJenisKendaraan()
    {
        return $this->table($this->table)
            ->select("jenis_kendaraan_table.id, jenis_kendaraan_table.jenis_kendaraan")
            ->orderBy('jenis_kendaraan_table.id desc')
            ->get()->getResultObject();
    }

    public function getKendaraan()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('jenis_kendaraan_table.id, jenis_kendaraan_table.jenis_kendaraan');
        return $builder->orderBy('jenis_kendaraan_table.id desc');
    }
}

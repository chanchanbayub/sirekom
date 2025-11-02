<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class JenisPerizinanModel extends Model
{
    protected $table            = 'jenis_perizinan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['surat_pengantar_id', 'jenis_perizinan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getJenisPerizinan()
    {
        return $this->table($this->table)
            ->select("jenis_perizinan_table.id, jenis_perizinan_table.jenis_perizinan, pengantar_perizinan_table.surat_pengantar")
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = jenis_perizinan_table.surat_pengantar_id')
            ->orderBy('jenis_perizinan_table.id desc')
            ->get()->getResultObject();
    }

    public function getPerizinan()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('jenis_perizinan_table.id, jenis_perizinan_table.jenis_perizinan, pengantar_perizinan_table.surat_pengantar')
            ->join('pengantar_perizinan_table', 'pengantar_perizinan_table.id = jenis_perizinan_table.surat_pengantar_id');
        return $builder->orderBy('jenis_perizinan_table.id desc');
    }
}

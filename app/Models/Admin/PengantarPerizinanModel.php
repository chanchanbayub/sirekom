<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengantarPerizinanModel extends Model
{
    protected $table            = 'pengantar_perizinan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['surat_pengantar'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getSuratPengantar()
    {
        return $this->table($this->table)
            ->select("pengantar_perizinan_table.id, pengantar_perizinan_table.surat_pengantar")
            ->orderBy('pengantar_perizinan_table.id desc')
            ->get()->getResultObject();
    }

    public function getPengantarPerizinan()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('pengantar_perizinan_table.id, pengantar_perizinan_table.surat_pengantar');
        return $builder->orderBy('pengantar_perizinan_table.id desc');
    }
}

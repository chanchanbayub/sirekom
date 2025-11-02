<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StatusPerizinanModel extends Model
{
    protected $table            = 'status_perizinan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['status_perizinan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getStatusPerizinan()
    {
        return $this->table($this->table)
            ->select("status_perizinan_table.id, status_perizinan_table.status_perizinan")
            ->orderBy('status_perizinan_table.id desc')
            ->get()->getResultObject();
    }

    public function getStatus()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('status_perizinan_table.id, status_perizinan_table.status_perizinan');
        return $builder->orderBy('status_perizinan_table.id desc');
    }
}

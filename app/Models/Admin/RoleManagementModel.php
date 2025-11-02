<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RoleManagementModel extends Model
{
    protected $table            = 'role_management_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['role_management'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getRoleManagement()
    {
        return $this->table($this->table)
            ->select("role_management_table.id, role_management_table.role_management")
            ->orderBy('role_management_table.id desc')
            ->get()->getResultObject();
    }

    public function getRole()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('role_management_table.id, role_management_table.role_management');
        return $builder->orderBy('role_management_table.id desc');
    }
}

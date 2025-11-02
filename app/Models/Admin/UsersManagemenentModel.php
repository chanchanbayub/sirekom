<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UsersManagemenentModel extends Model
{
    protected $table            = 'users_management_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['nama_lengkap', 'email', 'password', 'no_whatsapp', 'role_management_id'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUsersManagement()
    {
        return $this->table($this->table)
            ->select("users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management")
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->orderBy('users_management_table.id desc')
            ->get()->getResultObject();
    }

    public function getUsers()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management")
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id');
        return $builder->orderBy('role_management_table.id desc');
    }

    public function getUserManagementData($email)
    {
        return $this->table($this->table)
            ->select('users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management')
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["users_management_table.email" => $email])
            // ->where(["users_management_table.password" => $password])
            ->orderBy('users_management_table.id desc')
            ->get()->getRowObject();
    }
}

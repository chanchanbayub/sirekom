<?php

namespace App\Models\Operator;

use CodeIgniter\Model;

class UsersManagementModel extends Model
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

    public function getUsersManagementWhereId($id)
    {
        return $this->table($this->table)
            ->select("users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management")
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["users_management_table.id" => $id])
            ->orderBy('users_management_table.id desc')
            ->get()->getResultObject();
    }

    public function getUsers($id)
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management")
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["users_management_table.id" => $id]);
        return $builder->orderBy('role_management_table.id desc');
    }

    public function getUsersManagement($id)
    {
        return $this->table($this->table)
            ->select("users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management")
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["users_management_table.id" => $id])
            ->orderBy('users_management_table.id desc')
            ->get()->getResultObject();
    }

    // public function getUserManagementData($email)
    // {
    //     return $this->table($this->table)
    //         ->select('users_management_table.id, users_management_table.nama_lengkap, users_management_table.email, users_management_table.password, users_management_table.no_whatsapp, users_management_table.role_management_id, role_management_table.role_management')
    //         ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
    //         ->where(["users_management_table.email" => $email])
    //         // ->where(["users_management_table.password" => $password])
    //         ->orderBy('users_management_table.id desc')
    //         ->get()->getRowObject();
    // }
}

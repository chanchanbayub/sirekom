<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProfilUsersModel extends Model
{
    protected $table            = 'profil_users_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['users_id', 'nama_perusahaan', 'alamat_perusahaan', 'legalitas_perusahaan'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getProfilUsers()
    {
        return $this->table($this->table)
            ->select("profil_users_table.id, profil_users_table.users_id, profil_users_table.nama_perusahaan, profil_users_table.alamat_perusahaan, profil_users_table.legalitas_perusahaan,  users_management_table.nama_lengkap, users_management_table.email, users_management_table.no_whatsapp, role_management_table.role_management")
            ->join('users_management_table', 'users_management_table.id = profil_users_table.users_id')

            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->orderBy('profil_users_table.id desc')
            ->get()->getResultObject();
    }

    public function getProfil()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("profil_users_table.id, profil_users_table.users_id, profil_users_table.nama_perusahaan, profil_users_table.alamat_perusahaan, profil_users_table.legalitas_perusahaan, users_management_table.nama_lengkap, users_management_table.email, users_management_table.no_whatsapp, role_management_table.role_management")
            ->join('users_management_table', 'users_management_table.id = profil_users_table.users_id')
            // ->join('profil_users_table', 'profil_users_table.usr')
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id');
        return $builder->orderBy('profil_users_table.id desc');
    }

    public function getProfilUsersWhereUsersId($users_id)
    {
        return $this->table($this->table)
            ->select("profil_users_table.id, profil_users_table.users_id, profil_users_table.nama_perusahaan, profil_users_table.alamat_perusahaan, profil_users_table.legalitas_perusahaan, users_management_table.nama_lengkap, users_management_table.email, users_management_table.no_whatsapp, role_management_table.role_management")
            ->join('users_management_table', 'users_management_table.id = profil_users_table.users_id')
            ->join('role_management_table', 'role_management_table.id = users_management_table.role_management_id')
            ->where(["profil_users_table.users_id" => $users_id])
            ->orderBy('profil_users_table.id desc')
            ->get()->getRowObject();
    }
}

<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DatabaseTerintegrasiModel extends Model
{
    protected $table            = 'database_terintegrasi_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        // 'id',
        'kode_kontrak',
        'nomor_kendaraan',
        'operator',
        'kode_trayek',
        'trayek_lama',
        'no_body',
        'pemilik',
        'merk',
        'jenis_kendaraan',
        'chasis',
        'mesin',
        'tahun_pembuatan',
        'tahun_registrasi',
        'tipe_kendaraan',

    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKendaraanTerintegrasi()
    {
        return $this->table($this->table)
            ->select("DISTINCT(database_terintegrasi_table.operator) AS operator_kendaraan")
            // ->select('id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_terintegrasi_table.operator asc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanTerintegrasiWhereOperator($operator)
    {
        return $this->table($this->table)
            ->select("database_terintegrasi_table.operator")
            ->where(["operator" => $operator])
            // ->select('database_kendaraan_table.id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_terintegrasi_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanTable($operator)
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("database_terintegrasi_table.id, database_terintegrasi_table.nomor_kendaraan, database_terintegrasi_table.jenis_kendaraan ,database_terintegrasi_table.merk,database_terintegrasi_table.kode_trayek, database_terintegrasi_table.trayek_lama, database_terintegrasi_table.operator, database_terintegrasi_table.tahun_pembuatan")
            ->where(["database_terintegrasi_table.operator" => $operator]);
        return $builder->orderBy('database_terintegrasi_table.id desc');
    }

    public function getWhereNomorKendaraan($nomor_kendaraan)
    {


        return $this->table($this->table)
            ->select("database_terintegrasi_table.id, database_terintegrasi_table.nomor_kendaraan, database_terintegrasi_table.jenis_kendaraan ,database_terintegrasi_table.merk,database_terintegrasi_table.kode_trayek, database_terintegrasi_table.trayek_lama, database_terintegrasi_table.operator, database_terintegrasi_table.tahun_pembuatan")
            ->where(["database_terintegrasi_table.nomor_kendaraan" => $nomor_kendaraan])
            ->orderBy('database_terintegrasi_table.id desc')
            ->get()->getRowObject();
    }
}

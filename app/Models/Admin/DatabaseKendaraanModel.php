<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DatabaseKendaraanModel extends Model
{
    protected $table            = 'data_base_kendaraan_2014_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        // 'id',
        'nomor_kendaraan',
        'no_uji_kendaraan',
        'kode_trayek',
        'trayek',
        'operator',
        'alamat',
        'tahun',
        'merk',
        'awal_masa_berlaku',
        'habis_masa_berlaku',
        'tanggal_penerbitan',

    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKendaraan2014()
    {
        return $this->table($this->table)
            ->select("DISTINCT(data_base_kendaraan_2014_table.operator) AS operator_kendaraan")
            // ->select('id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('data_base_kendaraan_2014_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraan2014WhereOperator($operator)
    {
        return $this->table($this->table)
            ->select("data_base_kendaraan_2014_table.operator")
            ->where(["operator" => $operator])
            // ->select('database_kendaraan_table.id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('data_base_kendaraan_2014_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanTable($operator)
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("data_base_kendaraan_2014_table.id, data_base_kendaraan_2014_table.nomor_kendaraan, data_base_kendaraan_2014_table.no_uji_kendaraan, data_base_kendaraan_2014_table.kode_trayek, data_base_kendaraan_2014_table.trayek, data_base_kendaraan_2014_table.operator, data_base_kendaraan_2014_table.alamat, data_base_kendaraan_2014_table.tahun, data_base_kendaraan_2014_table.merk, data_base_kendaraan_2014_table.awal_masa_berlaku, data_base_kendaraan_2014_table.habis_masa_berlaku, data_base_kendaraan_2014_table.tanggal_penerbitan")
            ->where(["data_base_kendaraan_2014_table.operator" => $operator]);
        return $builder->orderBy('data_base_kendaraan_2014_table.id desc');
    }

    public function getDb2014($nomor_kendaraan)
    {
        return $this->table($this->table)
            ->select("data_base_kendaraan_2014_table.operator,data_base_kendaraan_2014_table.nomor_kendaraan, data_base_kendaraan_2014_table.no_uji_kendaraan,data_base_kendaraan_2014_table.merk, data_base_kendaraan_2014_table.tahun")
            ->where(["nomor_kendaraan" => $nomor_kendaraan])
            // ->select('database_kendaraan_table.id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('data_base_kendaraan_2014_table.id desc')
            ->get()->getRowObject();
    }
}

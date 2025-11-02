<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $table            = 'database_kendaraan_table';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields    = [
        // 'id',
        'nomor_kendaraan',
        'kode_kontrak',
        'jenis_kendaraan',
        'merk',
        'nomor_body',
        'nomor_rangka',
        'nomor_mesin',
        'tahun_pembuatan',
        'tahun_registrasi',
        'nomor_uji',
        'tipe_kendaraan',
        'operator',
        'alamat_perusahaan',
        'nama_pemilik',
        'kode_trayek_reguler',
        'kode_trayek_tj',
        'rute',
        'awal_masa_berlaku_kp',
        'habis_masa_berlaku_kp',
        'nomor_sk',
        'tanggal_penerbitan',
        'status_integrasi',
        'tgl_berlaku_uji',
        'jenis_perizinan',
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getDataKendaraanDataTable()
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select('operator')->distinct("database_kendaraan_table.operator AS operator_kendaraan");
        // $builder = $builder->distinct();
        // $builder = $builder;
        // ->where(["database_kendaraan_table.operator" => $operator]);
        return $builder->orderBy('database_kendaraan_table.id desc');
    }

    public function getDataKendaraan()
    {
        return $this->table($this->table)
            ->select("DISTINCT(database_kendaraan_table.operator) AS operator_kendaraan")
            // ->select('id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_kendaraan_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanTerintegrasi()
    {
        return $this->table($this->table)
            ->select("DISTINCT(database_kendaraan_table.operator) AS operator_kendaraan")
            // ->select('id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_kendaraan_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanWhereOperator($operator)
    {
        return $this->table($this->table)
            ->select("database_kendaraan_table.operator")
            ->where(["operator" => $operator])
            // ->select('database_kendaraan_table.id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_kendaraan_table.id desc')
            ->get()->getResultObject();
    }

    public function getDataKendaraanTable($operator)
    {
        $db = db_connect();
        $builder = $db->table($this->table);

        $builder = $builder->select("database_kendaraan_table.id, database_kendaraan_table.nomor_kendaraan, database_kendaraan_table.jenis_kendaraan, database_kendaraan_table.nomor_rangka, database_kendaraan_table.nomor_mesin, database_kendaraan_table.tahun_pembuatan, database_kendaraan_table.tahun_registrasi, database_kendaraan_table.nomor_uji, database_kendaraan_table.tipe_kendaraan, database_kendaraan_table.operator, kode_trayek_reguler, database_kendaraan_table.kode_trayek_tj, database_kendaraan_table.rute, database_kendaraan_table.habis_masa_berlaku_kp, database_kendaraan_table.nomor_sk, database_kendaraan_table.status_integrasi, database_kendaraan_table.jenis_perizinan, database_kendaraan_table.merk, database_kendaraan_table.tgl_berlaku_uji")
            ->where(["operator" => $operator]);
        return $builder->orderBy('database_kendaraan_table.id desc');
    }

    public function getRowKendaraan($nomor_kendaraan)
    {
        return $this->table($this->table)
            ->select("database_kendaraan_table.id,database_kendaraan_table.operator, database_kendaraan_table.nomor_kendaraan, database_kendaraan_table.merk, database_kendaraan_table.nomor_rangka,database_kendaraan_table.nomor_mesin, database_kendaraan_table.tahun_pembuatan, database_kendaraan_table.kode_trayek_reguler, database_kendaraan_table.nomor_uji")
            ->where(["database_kendaraan_table.nomor_kendaraan" => $nomor_kendaraan])
            // ->select('database_kendaraan_table.id')
            // ->select("COUNT(database_kendaraan_table.operator) AS jumlah_kendaraan")
            ->orderBy('database_kendaraan_table.id desc')
            ->get()->getRowArray();
    }
}

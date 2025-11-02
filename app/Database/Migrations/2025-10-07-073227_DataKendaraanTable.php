<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DataKendaraanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nomor_kendaraan' => [
                'type'           => 'varchar',
                'constraint'     => '255',
            ],
            'kode_kontrak' => [
                'type'           => 'varchar',
                'constraint'     => '255',
                'null'          => true
            ],
            'jenis_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'merk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_body' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_rangka' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_mesin' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tahun_pembuatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tahun_registrasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_uji' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tipe_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'operator' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'alamat_perusahaan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nama_pemilik' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'kode_trayek_reguler' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'kode_trayek_tj' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'rute' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'awal_masa_berlaku_kp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'habis_masa_berlaku_kp' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_sk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tanggal_penerbitan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'status_integrasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'jenis_perizinan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tgl_berlaku_uji' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'created_at' => [
                'type' => 'datetime',

            ],
            'updated_at' => [
                'type' => 'datetime',

            ],
        ]);
        $this->forge->addKey('id', true);
        $attributes = ['ENGINE' => 'InnoDB'];
        $this->forge->createTable('database_kendaraan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('database_kendaraan_table');
    }
}

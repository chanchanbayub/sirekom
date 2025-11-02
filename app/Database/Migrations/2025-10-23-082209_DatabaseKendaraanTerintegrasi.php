<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DatabaseKendaraanTerintegrasi extends Migration
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
            'kode_kontrak' => [
                'type'           => 'varchar',
                'constraint'     => '255',
                'null'          => true
            ],
            'nomor_kendaraan' => [
                'type'           => 'varchar',
                'constraint'     => '255',
                'null'          => true
            ],
            'operator' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'kode_trayek' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'trayek_lama' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'no_body' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'pemilik' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'merk' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'jenis_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],

            'chasis' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'mesin' => [
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
            'tipe_kendaraan' => [
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
        $this->forge->createTable('database_terintegrasi_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('database_terintegrasi_table');
    }
}

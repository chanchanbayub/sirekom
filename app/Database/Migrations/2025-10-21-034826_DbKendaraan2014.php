<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DbKendaraan2014 extends Migration
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
            'no_uji_kendaraan' => [
                'type'           => 'varchar',
                'constraint'     => '255',
                'null'          => true
            ],
            'kode_trayek' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'trayek' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'operator' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'alamat' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tahun' => [
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

            'awal_masa_berlaku' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'habis_masa_berlaku' => [
                'type'           => 'VARCHAR',
                'constraint'     => '255',
                'null'          => true
            ],
            'tanggal_penerbitan' => [
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
        $this->forge->createTable('data_base_kendaraan_2014_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('data_base_kendaraan_2014_table');
    }
}

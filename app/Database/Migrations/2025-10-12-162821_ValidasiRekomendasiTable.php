<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ValidasiRekomendasiTable extends Migration
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
            'id_pengajuan_rekom' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kendaraan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'validasi_stnk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
            ],
            'validasi_kir' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
                'null'           => true
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
        $this->forge->addForeignKey('id_pengajuan_rekom', 'pengajuan_rekomendasi_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('kendaraan_id', 'pengajuan_kendaraan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('validasi_rekom_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('validasi_rekom_table');
    }
}

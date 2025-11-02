<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengajuanKendaraanTable extends Migration
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
            'users_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'kode_trayek' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nomor_kendaraan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'nouji' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'merk' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'tahun_pembuatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'operator' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'tanggal_pengajuan' => [
                'type'           => 'date',
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
        $this->forge->addForeignKey('users_id', 'users_management_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengajuan_kendaraan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_kendaraan_table');
    }
}

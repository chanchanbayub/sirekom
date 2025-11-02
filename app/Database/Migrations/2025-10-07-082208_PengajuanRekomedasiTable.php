<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PengajuanRekomedasiTable extends Migration
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
            'noPengajuanRekom' => [
                'type'           => 'varchar',
                'constraint'     => '255',
            ],
            'surat_pengantar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'jenis_perizinan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'users_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'dokumen_surat_pengantar' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
            'dokumen_lainnya' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],

            'tanggal_pengajuan' => [
                'type'           => 'date',
            ],
            'status_perizinan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
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
        $this->forge->addForeignKey('surat_pengantar_id', 'pengantar_perizinan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('jenis_perizinan_id', 'jenis_perizinan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('users_id', 'users_management_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('status_perizinan_id', 'status_perizinan_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pengajuan_rekomendasi_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('pengajuan_rekomendasi_table');
    }
}

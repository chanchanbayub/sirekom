<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SuratRekomTable extends Migration
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
            'pengajuan_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'tanggal_surat' => [
                'type'           => 'date',
            ],
            'surat_rekomendasi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
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
        $this->forge->addForeignKey('pengajuan_id', 'pengajuan_rekomendasi_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('surat_rekomendasi_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('surat_rekomendasi_table');
    }
}

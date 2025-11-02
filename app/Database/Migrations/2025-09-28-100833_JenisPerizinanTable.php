<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JenisPerizinanTable extends Migration
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
            'surat_pengantar_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],

            'jenis_perizinan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
        $this->forge->createTable('jenis_perizinan_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('jenis_perizinan_table');
    }
}

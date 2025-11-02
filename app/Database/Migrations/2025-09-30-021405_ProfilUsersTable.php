<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProfilUsersTable extends Migration
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
            'users_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'       => true,
            ],
            'nama_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'legalitas_perusahaan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addForeignKey('users_id', 'users_management_table', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('profil_users_table', false, $attributes);
    }

    public function down()
    {
        $this->forge->dropTable('profil_users_table');
    }
}

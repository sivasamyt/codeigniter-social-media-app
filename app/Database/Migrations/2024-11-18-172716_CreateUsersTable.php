<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'first_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'last_name' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true,
                'null'       => false,
            ],
            'role' => [
                'type'       => 'ENUM',
                'constraint' => ['admin', 'user', 'moderator'],
                'default'    => 'user',
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP', 
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'TIMESTAMP', 
                'on_update' => 'CURRENT_TIMESTAMP', 
                'null'    => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
    
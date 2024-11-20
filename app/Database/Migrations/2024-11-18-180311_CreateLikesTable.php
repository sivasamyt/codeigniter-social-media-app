<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLikesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'post_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'user_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
                'null'       => false,
            ],
            'created_at' => [
                'type'    => 'TIMESTAMP',
                'null'    => true,
            ],
        ]);

        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');


        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('likes');
    }

    public function down()
    {
        $this->forge->dropTable('likes');
    }
}

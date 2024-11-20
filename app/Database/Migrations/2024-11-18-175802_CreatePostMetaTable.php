<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePostMetaTable extends Migration
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
            'meta_key' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'meta_value' => [
                'type' => 'TEXT',
                'null' => false,
            ],
        ]);

        $this->forge->addForeignKey('post_id', 'posts', 'id', 'CASCADE', 'CASCADE');

        $this->forge->addPrimaryKey('id');

        $this->forge->createTable('post_meta');
    }

    public function down()
    {
        $this->forge->dropTable('post_meta');
    }
}

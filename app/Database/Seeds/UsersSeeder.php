<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');

        $builder->insert([
            'first_name' => 'Mike',
            'last_name'  => 'Tyson',
            'email'      => 'mike@test.com',
            'role'       => 'admin',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $builder->insert([
            'first_name' => 'Mohamed',
            'last_name'  => 'Ali',
            'email'      => 'mohamed@test.com',
            'role'       => 'user',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $builder->insert([
            'first_name' => 'Manny',
            'last_name'  => 'Pacquio',
            'email'      => 'manny@test.com',
            'role'       => 'moderator',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

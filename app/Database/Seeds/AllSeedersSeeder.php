<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeedersSeeder extends Seeder
{
    public function run()
    {
        $this->call('UsersSeeder');
        $this->call('PostsSeeder');
    }
}

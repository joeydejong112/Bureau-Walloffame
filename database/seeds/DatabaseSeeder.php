<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
    {
        public function run()
        {
            $this->call([
                RoleTableSeeder::class, 
                UserTableSeeder::class,
            ]);
        }
    }
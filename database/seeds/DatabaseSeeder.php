<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
    {
        public function run()
        {
            
            $this->call([
                admin_control::class,
                RoleTableSeeder::class, 
                UserTableSeeder::class,
                // KlassenTableSeeder::class
            ]);
        }
    }
<?php

use Illuminate\Database\Seeder;
use App\admin_website;
class admin_control extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        


        DB::table('admin_website_control')->insert([
            'id' => 1,
            'register' => 1,
            'login' => 1,
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // <-- import it at the top


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            
        ]);
    }
}

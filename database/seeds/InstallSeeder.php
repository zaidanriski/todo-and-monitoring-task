<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('email','admin@gmail.com')->delete();

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 4,
        ]);

        DB::table('projects')->where('nama','Project Dummy')->delete();

        DB::table('projects')->insert([
            'nama' => 'Project Dummy',
            'status' => 1,
        ]);
    }
}

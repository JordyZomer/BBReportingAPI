<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'rclifford@cybershade.org',
            'is_verified' => true,
            'is_active' => true,
        ]);
    }
}
?>
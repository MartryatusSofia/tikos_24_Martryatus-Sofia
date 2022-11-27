<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1122'),
            'role'=>'admin',
        ]);
        User::create([
            'name' => 'User', 
            'email' => 'user@gmail.com',
            'password' => bcrypt('user1122'),
            'role'=>'user',
        ]);
    }
}

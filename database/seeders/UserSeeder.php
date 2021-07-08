<?php

namespace Database\Seeders;

use App\Models\User;
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
        $admin = User::create([
            'name' => 'Pegawai',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $admin->assignRole('admin');


        $user = User::create([
            'name' => 'Nafisa',
            'email' => 'nafisa@gmail.com',
            'password' => bcrypt('12345678')
        ]);

        $user->assignRole('user');
    }
}

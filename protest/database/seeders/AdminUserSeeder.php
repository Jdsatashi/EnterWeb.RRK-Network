<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'username' => 'adminuser',
            'role' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'qamanager',
            'username' => 'qamanageruser',
            'role' => '2',
            'phonenumber' => '012332123',
            'email' => 'qamanager@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'qacoor',
            'username' => 'qacooruser',
            'role' => '3',
            'phonenumber' => '045654560',
            'email' => 'qacoor@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'name' => 'staff',
            'username' => 'staffuser',
            'role' => '4',
            'phonenumber' => '086546321',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

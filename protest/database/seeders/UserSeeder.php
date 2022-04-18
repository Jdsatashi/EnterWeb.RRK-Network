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
        User::create([
            'department_id' => '1',
            'name' => 'adminname',
            'username' => 'adminuser',
            'role' => '1',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'department_id' => '1',
            'name' => 'qamanagername',
            'username' => 'qamanageruser',
            'role' => '2',
            'phonenumber' => '012332123',
            'email' => 'qamanager@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'department_id' => '2',
            'name' => 'qacoorname',
            'username' => 'qacooruser',
            'role' => '3',
            'phonenumber' => '045654560',
            'email' => 'qacoor@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'department_id' => '2',
            'name' => 'staffname',
            'username' => 'staffuser',
            'role' => '4',
            'phonenumber' => '086546321',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'department_id' => '3',
            'name' => 'qacoorname2',
            'username' => 'qacooruser2',
            'role' => '3',
            'phonenumber' => '045654560',
            'email' => 'qacoor2@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        User::create([
            'department_id' => '3',
            'name' => 'staffname2',
            'username' => 'staffuser2',
            'role' => '4',
            'phonenumber' => '086546321',
            'email' => 'staff2@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

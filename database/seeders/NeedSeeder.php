<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class NeedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'type' => 'administrator',
        ]);
        UserType::create([
            'type' => 'student',
        ]);

        User::create([
            'name' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'user_type_id' => 1,
            'role' => 'SSG ADVISER'
        ]);
        User::create([
            'name' => 'student',
            'username' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('password'),
            'user_type_id' => 2,
            'role' => 'student'
        ]);
    }
}

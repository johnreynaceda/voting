<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserType;
use App\Models\User;
use App\Models\Position;
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

        Position::create([
            'position_name' => 'President',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'Vice President',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'Secretary',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'Treasurer',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'Auditor',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'P.I.O',
            'vote_limit' => 1
        ]);
        Position::create([
            'position_name' => 'Business Managers',
            'vote_limit' => 2
        ]);
        Position::create([
            'position_name' => 'Sergeant at Arms',
            'vote_limit' => 2
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User 0',
                'email' => 'user0@example.com',
                'password' => Hash::make('Test@123'),
                'role' => 0,
            ],
            [
                'name' => 'User 1',
                'email' => 'user1@example.com',
                'password' => Hash::make('Test@123'),
                'role' => 1,
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'password' => Hash::make('Test@123'),
                'role' => 2,
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}

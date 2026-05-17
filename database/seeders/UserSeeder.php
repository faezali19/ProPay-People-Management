<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        User::create([
            'name'     => 'User Two',
            'email'    => 'user2@admin.com',
            'password' => bcrypt('password'),
        ]);
    }
}
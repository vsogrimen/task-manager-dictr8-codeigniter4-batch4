<?php

namespace App\Database\Seeds;

use App\Entities\User;
use App\Models\UserModel;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = model(UserModel::class);

        $users->insert(new User([
            'name'     => 'Ana Reyes',
            'email'    => 'ana@example.com',
            'password' => 'password123',
        ]));
        $users->insert(new User([
            'name'     => 'Ben Cruz',
            'email'    => 'ben@example.com',
            'role'     => 'admin',
            'password' => 'password123',
        ]));
    }
}

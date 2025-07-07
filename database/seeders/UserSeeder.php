<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'no_hp' => '081234567890',
            'alamat' => 'Jl. Admin No. 1',
            'photo' => 'default.jpg',
            'tanggal_lahir' => '1990-01-01',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'status_akun' => 'active',
        ]);
        User::create([
            'name' => 'Member',
            'no_hp' => '081234567891',
            'alamat' => 'Jl. Member No. 1',
            'photo' => 'default.jpg',
            'tanggal_lahir' => '1995-01-01',
            'password' => bcrypt('member123'),
            'role' => 'member',
            'status_akun' => 'active',
        ]);
    }
}

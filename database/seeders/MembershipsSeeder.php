<?php

namespace Database\Seeders;

use App\Models\Memberships;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MembershipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Memberships::create([
            'package_name' => 'Individu',
            'price' => 180000,
            'duration' => '1 month',
        ]);
        Memberships::create([
            'package_name' => 'Couple',
            'price' => 160000,
            'duration' => '1 month',
        ]);
        Memberships::create([
            'package_name' => 'Corporate',
            'price' => 140000,
            'duration' => '1 month',
        ]);
    }
}

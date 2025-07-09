<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonalTrainers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PersonalTrainersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersonalTrainers::create([
            'name' => 'John Doe',
            'price' => 50000,
            'no_wa' => '081234567892',
        ]);
        PersonalTrainers::create([
            'name' => 'Jane Smith',
            'price' => 60000,
            'no_wa' => '081234567893',
        ]);
        PersonalTrainers::create([
            'name' => 'Mike Johnson',
            'price' => 55000,
            'no_wa' => '081234567894',
        ]);
    }
}

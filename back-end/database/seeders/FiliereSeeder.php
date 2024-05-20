<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {



        $filiers = [
            [
                'nom' => 'Informatique',
                'description' => 'Informatique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Electrique',
                'description' => 'Electrique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Electronique',
                'description' => 'Electronique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Electrotechnique',
                'description' => 'Electrotechnique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Filiere::insert($filiers);
    }
}

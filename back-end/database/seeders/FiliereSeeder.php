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
        Filiere::create([
            'nom' => 'Informatique',
            'description' => 'Informatique',
        ]);

        Filiere::create([
            'nom' => 'Electrique',
            'description' => 'Electrique',
        ]);

        Filiere::create([
            'nom' => 'Electronique',
            'description' => 'Electronique',
        ]);

        Filiere::create([
            'nom' => 'Electrotechnique',
            'description' => 'Electrotechnique',
        ]);
    }
}

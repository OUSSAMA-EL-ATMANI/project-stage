<?php

namespace Database\Seeders;

use App\Models\Filiere;
use App\Models\Validator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ValidatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Communication & Soft Skills
            ['first_name' => 'Kaoutar', 'last_name' => 'Meddri', 'email' => 'kaoutar@ofppt.com', 'filiere_id' => Filiere::where('name', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Traf', 'email' => 'khadija@ofppt.com', 'filiere_id' => Filiere::where('name', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Chekrani', 'email' => 'khadija.chekrani@ofppt.com', 'filiere_id' => Filiere::where('name', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            // Génie électrique
            ['first_name' => 'Faical', 'last_name' => 'Essaiydy', 'email' => 'faical@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mohammed', 'last_name' => 'Salahi', 'email' => 'mohammed@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Said', 'last_name' => 'Fallah', 'email' => 'said@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelhadi', 'last_name' => 'Souda', 'email' => 'abdelhadi@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ilham', 'last_name' => 'Barhdadi', 'email' => 'ilham@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            // Génie Mécanique
            ['first_name' => 'Badr-eddine', 'last_name' => 'Aaqil', 'email' => 'badr-eddine@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie Mécanique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ahmed', 'last_name' => 'Eddanguir', 'email' => 'ahmed@ofppt.com', 'filiere_id' => Filiere::where('name', 'Génie Mécanique')->first()->id, 'password' => Hash::make('ofppt')],
            // Métiers de l’Automobile
            ['first_name' => 'Ayoub', 'last_name' => 'Rajil', 'email' => 'ayoub@ofppt.com', 'filiere_id' => Filiere::where('name', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khalid', 'last_name' => 'Naji', 'email' => 'khalid@ofppt.com', 'filiere_id' => Filiere::where('name', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Salaheddine', 'last_name' => 'Bahri', 'email' => 'salaheddine@ofppt.com', 'filiere_id' => Filiere::where('name', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
        ];

        foreach ($data as $validatorData) {
            Validator::create($validatorData);
        }
    }
}

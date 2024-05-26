<?php

namespace Database\Seeders;

use App\Models\Secteur;
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
            ['first_name' => 'Kaoutar', 'last_name' => 'Meddri', 'email' => 'kaoutar@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Traf', 'email' => 'khadija@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Chekrani', 'email' => 'khadija.chekrani@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Communication & Soft Skills')->first()->id, 'password' => Hash::make('ofppt')],
            // Génie électrique
            ['first_name' => 'Faical', 'last_name' => 'Essaiydy', 'email' => 'faical@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mohammed', 'last_name' => 'Salahi', 'email' => 'mohammed@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Said', 'last_name' => 'Fallah', 'email' => 'said@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelhadi', 'last_name' => 'Souda', 'email' => 'abdelhadi@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ilham', 'last_name' => 'Barhdadi', 'email' => 'ilham@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie électrique')->first()->id, 'password' => Hash::make('ofppt')],
            // Génie Mécanique
            ['first_name' => 'Badr-eddine', 'last_name' => 'Aaqil', 'email' => 'badr-eddine@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie Mécanique')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ahmed', 'last_name' => 'Eddanguir', 'email' => 'ahmed@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Génie Mécanique')->first()->id, 'password' => Hash::make('ofppt')],
            // Métiers de l’Automobile
            ['first_name' => 'Ayoub', 'last_name' => 'Rajil', 'email' => 'ayoub@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khalid', 'last_name' => 'Naji', 'email' => 'khalid@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
            ['first_name' => 'Salaheddine', 'last_name' => 'Bahri', 'email' => 'salaheddine@ofppt.ma', 'secteur_id' => Secteur::where('nom', 'Métiers de l’Automobile')->first()->id, 'password' => Hash::make('ofppt')],
        ];

        foreach ($data as $validatorData) {
            Validator::create($validatorData);
        }
    }
}

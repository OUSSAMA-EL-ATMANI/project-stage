<?php

namespace Database\Seeders;

use App\Models\Designer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // Mle Affecté Présentiel Actif    Formateur Affecté Présentiel Actif
            ['first_name' => 'Fatima', 'last_name' => 'Moustati', 'email' => 'fatima.moustati@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Kaoutar', 'last_name' => 'Meddri', 'email' => 'kaoutar.meddri@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Hassan', 'last_name' => 'Khoullak', 'email' => 'hassan.khoullak@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Faical', 'last_name' => 'Essaiydy', 'email' => 'faical.essaiydy@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Traf', 'email' => 'khadija.traf@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mostafa', 'last_name' => 'Zahouani', 'email' => 'mostafa.zahouani@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mohammed', 'last_name' => 'Salahi', 'email' => 'mohammed.salahi@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdeltif', 'last_name' => 'Lahrari', 'email' => 'abdeltif.lahrari@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Said', 'last_name' => 'Fallah', 'email' => 'said.fallah@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Youssef', 'last_name' => 'Fatah', 'email' => 'youssef.fatah@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Saida', 'last_name' => 'Kraiouch', 'email' => 'saida.kraiouch@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Karim', 'last_name' => 'Hassoune', 'email' => 'karim.hassoune@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelhadi', 'last_name' => 'Souda', 'email' => 'abdelhadi.souda@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ahmed', 'last_name' => 'Elharti', 'email' => 'ahmed.elharti@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Boubker', 'last_name' => 'Mouti', 'email' => 'boubker.mouti@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ilham', 'last_name' => 'Barhdadi', 'email' => 'ilham.barhdadi@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ayoub', 'last_name' => 'Rajil', 'email' => 'ayoub.rajil@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khadija', 'last_name' => 'Chekrani', 'email' => 'khadija.chekrani@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Zineb', 'last_name' => 'Chaki', 'email' => 'zineb.chaki@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Anass', 'last_name' => 'Khalfi', 'email' => 'anass.khalfi@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelkrim', 'last_name' => 'Belasri', 'email' => 'abdelkrim.belasri@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Redouane', 'last_name' => 'Souhail', 'email' => 'redouane.souhail@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Said', 'last_name' => 'Nait El Haj', 'email' => 'said.naitelhaj@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Adil', 'last_name' => 'Anibat', 'email' => 'adil.anibat@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Badr-eddine', 'last_name' => 'Aaqil', 'email' => 'badr-eddine.aaqil@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mohamed', 'last_name' => 'Ait Tahar', 'email' => 'mohamed.aittahar@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mohamed', 'last_name' => 'Elmechbouk', 'email' => 'mohamed.elmechbouk@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Ahmed', 'last_name' => 'Eddanguir', 'email' => 'ahmed.eddanguir@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelmajid', 'last_name' => 'Maziane', 'email' => 'abdelmajid.maziane@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Khalid', 'last_name' => 'Naji', 'email' => 'khalid.naji@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Mostafa', 'last_name' => 'Lagmiri', 'email' => 'mostafa.lagmiri@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Abdelghani', 'last_name' => 'Ennaciri', 'email' => 'abdelghani.ennaciri@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Salaheddine', 'last_name' => 'Bahri', 'email' => 'salaheddine.bahri@ofppt.com', 'password' => Hash::make('ofppt')],
            ['first_name' => 'Moussa', 'last_name' => 'Essaadaoui', 'email' => 'moussa.essaadaoui@ofppt.com', 'password' => Hash::make('ofppt')],
        ];

        foreach ($data as $designerData) {
            Designer::create($designerData);
        }
    }
}

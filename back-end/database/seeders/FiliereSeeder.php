<?php

namespace Database\Seeders;

use App\Models\Filiere;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filiers = [
            [
                'nom' => 'Automatisation et Instrumentation Industrielle',
                'description' => 'Automatisation et Instrumentation Industrielle',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Electromécanique des Systèmes Automatisées',
                'description' => 'Electromécanique des Systèmes Automatisées',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => '(CDS)Electromécanique des Systèmes Automatisées',
                'description' => '(CDS)Electromécanique des Systèmes Automatisées',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Technicien Spécialisé de Méthodes en Fabrication Mécanique',
                'description' => 'Technicien Spécialisé de Méthodes en Fabrication Mécanique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Réparateur de véhicule automobile (MAALEM)',
                'description' => 'Réparateur de véhicule automobile (MAALEM)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Technico-Commercial en Vente de Véhicules et Pièces de Rechange',
                'description' => 'Technico-Commercial en Vente de Véhicules et Pièces de Rechange',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Technicien spécialisé en Diagnostic et Electronique Embarquée',
                'description' => 'Technicien spécialisé en Diagnostic et Electronique Embarquée',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => '(CDS)Technicien spécialisé en Diagnostic et Electronique Embarquée',
                'description' => '(CDS)Technicien spécialisé en Diagnostic et Electronique Embarquée',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Filiere::insert($filiers);
    }
}

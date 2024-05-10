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
        Designer::create([
            'first_name' => 'Oussama',
            'last_name' => 'Othmani',
            'email' => 'designer@ofppt.com',
            'password' => Hash::make('ofppt'),
        ]);
    }
}

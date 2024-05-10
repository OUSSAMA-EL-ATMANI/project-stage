<?php

namespace Database\Seeders;

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
        Validator::create([
            'first_name' => 'Oussama',
            'last_name' => 'Othmani',
            'email' => 'validator@ofppt.com',
            'password' => Hash::make('ofppt'),
        ]);
    }
}

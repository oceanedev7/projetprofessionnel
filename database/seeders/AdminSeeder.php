<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'prenom' => 'Admin',
            'nom' => 'Admin',
            'telephone' => '0596 67 64 53',
            'email' => 'contact@toutlahaut.org',
            'password' => Hash::make('toutlahaut2604/'), 
            'adresse_postale' => 'Route de Jolimont',
            'code_postal' => '97226',
            'ville' => 'Morne-vert',
            'message' => 'Compte Admin',
            'role' => 'admin', 
        ]);
    }
    }


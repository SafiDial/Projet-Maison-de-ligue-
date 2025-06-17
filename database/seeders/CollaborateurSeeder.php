<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborateur;
use Illuminate\Support\Facades\Hash;

class CollaborateurSeeder extends Seeder
{
    public function run()
    {
        Collaborateur::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'), 
            'isAdmin' => true, 
        ]);
    }
}
//   fiata@gmail.com
//   12345678
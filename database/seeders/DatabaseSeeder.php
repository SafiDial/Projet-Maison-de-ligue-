<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Appeler le seeder pour insérer un utilisateur par défaut
        $this->call(CollaborateurSeeder::class);
    }
}

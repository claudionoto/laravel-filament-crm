<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gestionUser = Account::factory()->create([
            'name' => 'Giovanni',
            'surname' => 'Rossi',
            'username' => 'giovannirossi',
            'email' => 'giovanni@example.com',
            'level' => 'gestione',
            'agent_code' => 'G123',
        ]);

        $structureUser = Account::factory()->create([
            'name' => 'Maria',
            'surname' => 'Verdi',
            'username' => 'mariaverdi',
            'email' => 'maria@example.com',
            'level' => 'struttura',
            'agent_code' => 'S123',
        ]);

        $agentUser = Account::factory()->create([
            'name' => 'Luigi',
            'surname' => 'Bianchi',
            'username' => 'luigibianchi',
            'email' => 'luigi@example.com',
            'level' => 'agente',
            'agent_code' => 'A123',
        ]);

        // Creare 500 utenti aggiuntivi
        Account::factory(500)->create([
            'area_manager_id' => $gestionUser->id,
            'structure_id' => $structureUser->id,
        ]);
    }
}

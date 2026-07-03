<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigneComptableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Nettoyage de la table des lignes
        DB::table('ligne_comptables')->truncate();

        // Nettoyage de la table des écritures si elle existe localement
        try {
            DB::table('ecriture_comptables')->truncate();
        } catch (\Exception $e) {
            // Ignoré si la table n'existe pas localement
        }

        // --- Écriture 1: Achat de fournitures (XAF) ---
        $ecritureId1 = 1;
        try {
            DB::table('ecriture_comptables')->insert([
                'id' => $ecritureId1,
                'numero' => 'ECR-2026-0001',
                'date' => '2026-07-01',
                'operation_id' => 10,
                'devise' => 'XAF',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Ignoré si la table n'existe pas localement
        }

        DB::table('ligne_comptables')->insert([
            [
                'ecriture_id' => $ecritureId1,
                'compte' => '606300', // Fournitures
                'type_op' => 'D', // Débit
                'montant' => 125000,
                'ref' => 'FAC-BUREAU-99',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ecriture_id' => $ecritureId1,
                'compte' => '401000', // Fournisseurs
                'type_op' => 'C', // Crédit
                'montant' => 125000,
                'ref' => 'FAC-BUREAU-99',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // --- Écriture 2: Vente de prestations de services (EUR) ---
        $ecritureId2 = 2;
        try {
            DB::table('ecriture_comptables')->insert([
                'id' => $ecritureId2,
                'numero' => 'ECR-2026-0002',
                'date' => '2026-07-02',
                'operation_id' => 11,
                'devise' => 'EUR',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Ignoré si la table n'existe pas localement
        }

        DB::table('ligne_comptables')->insert([
            [
                'ecriture_id' => $ecritureId2,
                'compte' => '411000', // Clients
                'type_op' => 'D', // Débit
                'montant' => 1500,
                'ref' => 'FACT-CLI-202',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ecriture_id' => $ecritureId2,
                'compte' => '706000', // Prestations de services
                'type_op' => 'C', // Crédit
                'montant' => 1500,
                'ref' => 'FACT-CLI-202',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // --- Écriture 3: Frais de déplacement (XAF) ---
        $ecritureId3 = 3;
        try {
            DB::table('ecriture_comptables')->insert([
                'id' => $ecritureId3,
                'numero' => 'ECR-2026-0003',
                'date' => '2026-07-03',
                'operation_id' => 12,
                'devise' => 'XAF',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Ignoré si la table n'existe pas localement
        }

        DB::table('ligne_comptables')->insert([
            [
                'ecriture_id' => $ecritureId3,
                'compte' => '625100', // Déplacements
                'type_op' => 'D', // Débit
                'montant' => 45000,
                'ref' => 'NDF-JULIEN',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ecriture_id' => $ecritureId3,
                'compte' => '512000', // Banque
                'type_op' => 'C', // Crédit
                'montant' => 45000,
                'ref' => 'NDF-JULIEN',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

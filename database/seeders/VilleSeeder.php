<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VilleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $villes = ['Montréal', 'Québec', 'Laval', 'Longueuil', 'Sherbrooke', 'Trois-Rivières', 'Gatineau', 'Saguenay', 'Lévis', 'Drummondville', 'Granby', 'Saint-Jean-sur-Richelieu', 'Repentigny', 'Terrebonne', 'Blainville'];
        foreach ($villes as $ville) {
            \App\Models\Ville::create(['nom' => $ville]);
        }
    }
}

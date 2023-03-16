<?php

namespace Database\Seeders;
use App\Models\Region;
use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class insert_some_region extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ajouter les régions
        $dakar = Region::create(['libelle' => 'Dakar']);
        $ziguinchor = Region::create(['libelle' => 'Ziguinchor']);
        $saintLouis = Region::create(['libelle' => 'Saint-Louis']);

        // Ajouter les départements de Dakar
        $dakarDept = Departement::create(['libelle' => 'Dakar', 'region_id' => $dakar->id]);
        $pikine = Departement::create(['libelle' => 'Pikine', 'region_id' => $dakar->id]);
        $rufisque = Departement::create(['libelle' => 'Rufisque', 'region_id' => $dakar->id]);
        $guediawaye = Departement::create(['libelle' => 'Guédiawaye', 'region_id' => $dakar->id]);
        $keurMassar = Departement::create(['libelle' => 'Keur Massar', 'region_id' => $dakar->id]);

        // Ajouter les départements de Ziguinchor
        $bignona = Departement::create(['libelle' => 'Bignona', 'region_id' => $ziguinchor->id]);
        $oussouye = Departement::create(['libelle' => 'Oussouye', 'region_id' => $ziguinchor->id]);
        $ziguinchorDept = Departement::create(['libelle' => 'Ziguinchor', 'region_id' => $ziguinchor->id]);

        // Ajouter les départements de Saint-Louis
        $dagana = Departement::create(['libelle' => 'Dagana', 'region_id' => $saintLouis->id]);
        $saintLouisDept = Departement::create(['libelle' => 'Saint-Louis', 'region_id' => $saintLouis->id]);
        $podor = Departement::create(['libelle' => 'Podor', 'region_id' => $saintLouis->id]);    }
}

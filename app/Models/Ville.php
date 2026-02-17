<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function run()
    {
        $villes = [
            'Montréal',
            'Québec',
            'Laval',
            'Longueuil',
            'Sherbrooke',
            'Trois-Rivières',
            'Gatineau',
            'Saguenay',
            'Lévis',
            'Drummondville',
            'Granby',
            'Saint-Jean-sur-Richelieu',
            'Repentigny',
            'Terrebonne',
            'Blainville'
        ];

        foreach ($villes as $ville) {
            Ville::create(['nom' => $ville]);
        }
    }

    // Relation : une ville possède plusieurs étudiants
    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}

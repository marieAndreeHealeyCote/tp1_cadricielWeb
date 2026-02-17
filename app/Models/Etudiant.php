<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse',
        'telephone',
        'email',
        'date_naissance',
        'ville_id'
    ];

    public function definition()
    {
        return [
            'nom' => $this->faker->name,
            'adresse' => $this->faker->address,
            'telephone' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'date_naissance' => $this->faker->date(),
            'ville_id' => \App\Models\Ville::inRandomOrder()->first()->id
        ];
    }

    public function ville()
    {
        return $this->belongsTo(Ville::class);
    }
}

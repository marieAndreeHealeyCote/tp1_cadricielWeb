<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Etudiant;
use App\Models\Post;
use App\Models\Document;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function etudiant()
    {
        return $this->hasOne(Etudiant::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}

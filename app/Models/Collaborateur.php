<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collaborateur extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'collaborateurs';

    // Champs autorisés pour l'insertion/mise à jour
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'birthdate', 'city', 'country', 'photo', 'service', 'isAdmin',
    ];

    // Champs à cacher dans les réponses JSON (pour éviter d'exposer le mot de passe)
    protected $hidden = [
        'password',
    ];

    // Champs à convertir en dates
    protected $dates = [
        'birthdate',
    ];

    // Champs à caster automatiquement
    protected $casts = [
        'isAdmin' => 'boolean',
    ];
}

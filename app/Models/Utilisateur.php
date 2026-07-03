<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class Utilisateur extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        "id",
        "matricule",
        "login",
        "nom",
        "mdp",
        "email",
        "remember_token",       
    ];

    public function getAuthIdentifier()
    {
        return $this->login;
    }

    public function getAuthPassword()
    {
        return $this->mdp;
    }

    protected $hidden = [
        'mdp',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mdp' => 'hashed',
        ];
    }


}

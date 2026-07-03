<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

<<<<<<< HEAD
class Utilisateur extends Model
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory;
=======
class Utilisateur extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UtilisateurFactory> */
    use HasFactory, Notifiable, HasRoles;
>>>>>>> origin/dev

    protected $fillable = [
        "id",
        "matricule",
        "login",
        "nom",
<<<<<<< HEAD
        "mdp"
    ];
        
=======
        "mdp",
        "email",
        "is_active",
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


>>>>>>> origin/dev
}

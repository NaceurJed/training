<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\exercice;

class Competiteur extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $fillable = ['nom', 'prenom', 'pseudo', 'date_naissance', 'email', 'poids', 'sport', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function Competitions()
    {
        return $this->belongsToMany(Competition::class, 'competiteur_competition_jury', 'competiteur_id', 'competition_id');
    }

    public function exercice()
    {
        return $this->belongsToMany(exercice::class, 'entrainements', 'competiteur_id', 'exercice_id')->withPivot('serie', 'temps_serie', 'temps_repos', 'repetition_serie', 'created_at', 'updated_at');
    }

}

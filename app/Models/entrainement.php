<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entrainement extends Model
{
    use HasFactory;
    protected $fillable = ['competiteur_id', 'exercice_id', 'serie', 'temps_serie', 'temps_repos', 'repetition_serie'];
    // protected $primaryKey = 'created_at';
}

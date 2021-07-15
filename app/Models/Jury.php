<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jury extends Model
{
    use HasFactory;

    public function Competiteurs()
    {
        return $this->belongsToMany(Competiteur::class, 'competiteur_competition_jury','jury_id', 'competiteur_id');
    }
}

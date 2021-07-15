<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'description', 'date_compet', 'image'];
    
    public function Competiteurs()
    {
        return $this->belongsToMany(Competiteur::class, 'competiteur_competition_jury','competition_id', 'competiteur_id');
    }
}

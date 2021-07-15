<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Competiteur;
class exercice extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'contenu', 'image'];

    public function Competiteur()
    {
        return $this->belongsToMany(Competiteur::class, 'entrainements', 'exercice_id', 'competiteur_id');
    }
}

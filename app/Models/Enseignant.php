<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nom',
        'prenom',
        'sexe',
        'adresse',
        'contact'
    ];

    
    public function specialite() {
        return $this->belongsTo(Specialite::class);
    }


    public function matieres(){
        return $this->belongsToMany(Matiere::class);
    }


    public function niveau_etudes(){
        return $this->belongsToMany(Niveau_etude::class);
    }
}

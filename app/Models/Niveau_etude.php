<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Niveau_etude extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code_niveau_etude',
        'niveau',
        'description'
    ];

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }


    public function enseignants(){
        return $this->belongsToMany(Enseignant::class);
    }
}

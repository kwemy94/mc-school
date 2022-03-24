<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    use SoftDeletes;
     protected $fillable = [
         'code_specialite',
         'libelle'
    ];

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }


    public function enseignant() {
        return $this->hasMany(Enseignant::class);
    }


     
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'code_matiere',
        'nom_matiere',
        'coefficient',
        'nombre_heure'
    ];

    public function specialite() {
        return $this->belongsTo(Specialite::class);
    }


    public function session() {
        return $this->belongsTo(Session::class);
    }


    public function niveau_etude() {
        return $this->belongsTo(Niveau_etude::class);
    }


    public function module() {
        return $this->belongsTo(Module::class);
    }


    public function enseignants(){
        return $this->belongsToMany(Enseignant::class);
    }
}

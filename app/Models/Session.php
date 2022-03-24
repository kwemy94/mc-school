<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use SoftDeletes;
     protected $fillable = [
         'code_session',
         'numero_session',
         'date_debut',
         'date_fin'
    ];

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }
}

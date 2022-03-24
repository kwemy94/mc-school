<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use SoftDeletes;
     protected $fillable = [
         'code_module',
         'nom_module',
         'description'
    ];

    public function matieres() {
        return $this->hasMany(Matiere::class);
    }

     
}

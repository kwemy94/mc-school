<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'code_filiere',
        'nom_filiere',
        'frais_scolarite',
        'statut'
    ];
}

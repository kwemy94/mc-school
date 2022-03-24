<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Annee_academique extends Model
{
    use SoftDeletes;
     protected $fillable = [
         'code_annee_academique',
         'date_debut',
         'date_fin'
     ];
}

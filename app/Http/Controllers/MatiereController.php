<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index(){

        $matieres = Matiere::all();

        return \view('admin.matiere.index', compact('matieres'));
    }
}

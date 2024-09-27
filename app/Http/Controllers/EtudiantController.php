<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index(){
        $nom = 'Idoudi';
        $prenom = 'Hechmi';
        return view('etudiant',compact('nom','prenom'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;

class EtudiantController extends Controller
{
    public function index(){
        $liste = Etudiant::orderBy('nom', 'asc')->get();
        $classes = Classe::all();
        return view('etudiant', compact('liste', 'classes'));
    }

    public function create(){
        $classes = Classe::all();
        return view('create', compact('classes'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'classes_id' => 'required'
    ]);

    Etudiant::create(
        $request->all()
    );

    return redirect()->route('etudiant')
        ->with('success', 'Student created successfully');
}


                //update
public function edit(Etudiant $etudiant){
    $classes=classe::all();
    return view('edit', compact('etudiant', 'classes')); 
}

public function update(Request $request , Etudiant $etudiant){
    $request->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'classes_id'=>'required'
    ]);
    $etudiant->update([
        'nom'=>$request->nom,
        'prenom'=>$request->prenom,
        'classes_id'=>$request->classes_id
    ]);
    return redirect()->route('etudiant')->with('sucess','Student updated sucessfully');
}

public function delete(Etudiant $etudiant){
    $etudiant->delete();
    return redirect()->route('etudiant')->with('sucess','Student deleted sucessfully');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Etudiant;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
{
    $etudiants = Etudiant::with('classe')->get();
    return view('etudiant', ['liste' => $etudiants]);
}

}

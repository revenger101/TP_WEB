<?php

use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::resource('/etudiant','App\http\Controllers\EtudiantController');
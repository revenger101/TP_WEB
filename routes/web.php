<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function() {

    Route::get('/etudiant', [EtudiantController::class, 'index'])->name('etudiant');


    Route::get('/etudiant/create', [EtudiantController::class, 'create'])->name('etudiant.create');
    Route::post('/etudiant/store', [EtudiantController::class, 'store'])->name('etudiant.ajouter');

    Route::put('/etudiant/{etudiant}', [EtudiantController::class, 'update'])->name('etudiant.update');
    Route::get('/etudiant/{etudiant}',[EtudiantController::class, 'edite'])->name('etudiant.edite');


    Route::delete('/etudiant/{etudiant}', [EtudiantController::class, 'delete'])->name('etudiant.delete');
});



<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaticController;


Route::get('/', [StaticController::class, 'welcome'])->name('home');
Route::get('/Latu-Entreprise', [StaticController::class, 'latuEntreprise'])->name('latuEntreprise');
Route::get('/peinture', [StaticController::class, 'peinture'])->name('peinture');
Route::get('/sols', [StaticController::class, 'sols'])->name('sols');
Route::get('/isolation-thermique-exterieur', [StaticController::class, 'ite'])->name('ite');
Route::get('/mentions-legales', [StaticController::class, 'mentionsLegales'])->name('mentionsLegales');



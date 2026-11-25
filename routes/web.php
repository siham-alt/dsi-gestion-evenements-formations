<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\EvenementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\InscriptionEvController;
use App\Http\Controllers\ContactController;

Route::redirect('/', '/acceuil');
Route::get('/register',[LoginController::class ,'register'])->name('register');
Route::post('/register', [LoginController::class, 'registersave'])->name('register.save');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginaction'])->name('login.action');
Route::get('/acceuil', [AcceuilController::class, 'index'])->name('acceuil');


Route::get('/dashboard', function () {
    return view('base');
})->middleware(['auth','verified'])->name('base');



Route::resource('Evenements',EvenementController::class);
Route::resource('Formation',FormationController::class);

Route::get('/Formations', [FormationController::class, 'show'])->name('formations.show');
Route::get('/Evenement', [EvenementController::class, 'show'])->name('evenements.show');

Route::resource('Incription',InscriptionController::class);
Route::resource('InscriptionEv', InscriptionEvController::class);

Route::post('/inscriptions', [InscriptionController::class, 'store'])->name('Inscription.store');
Route::post('/inscriptionsEv', [InscriptionEvController::class, 'store'])->name('InscriptionEv.store');


Route::get('/contact/messages', [ContactController::class, 'index'])->name('contact.messages');

Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


Route::get('/evenements/{id}/inscriptions', [EvenementController::class, 'inscriptions'])->name('Evenements.inscriptions');

Route::get('/formations/{id}/inscriptions', [FormationController::class, 'inscriptions'])->name('formations.inscriptions');

Route::get('/contact', [ContactController::class, 'for'])->name('contact');

<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// AUTH ROUTES
Auth::routes(['verify' => true]);


// ============================================================================
// == PUBLIC
// ============================================================================

// HOMEPAGE
Route::view('/', 'welcome');

// EDITIONS EN VIDEO
Route::view('/editions-en-video', 'editions-en-video');

// DONNEE PERSONNELLES
Route::view('/donnees-personnelles', 'donnees-personnelles')->name('donnees-personnelles');

// PRESENTATION
Route::view('/presentation', 'presentation');

// CONSIGNES
Route::view('/regles-conseils', 'regles-conseils');

// ORGANISATION
Route::view('/organisation', 'organisation');

// ENTRAINEMENTS
Route::view('/entrainements', 'entrainements');

// AFFICHES
Route::view('/affiches', 'affiches');

// TEST
Route::view('/test', 'test');

// CLEAR COOKIE
Route::get('/direct-register', function(){
   Cookie::queue(Cookie::forget(strtolower(str_replace(' ', '_', config('app.name'))) . '_session'));
   return redirect('/register');
});

Route::get('/direct-login', function(){
   Cookie::queue(Cookie::forget(strtolower(str_replace(' ', '_', config('app.name'))) . '_session'));
   return redirect('/login');
});

Route::get('/direct-welcome', function(){
   Cookie::queue(Cookie::forget(strtolower(str_replace(' ', '_', config('app.name'))) . '_session'));
   return redirect('/');
});


// ============================================================================
// == CONSOLE
// ============================================================================

// jeton generator - inutile l'an prochain
Route::get('/console/jetons-generator', [App\Http\Controllers\ConsoleController::class, 'jetons_generator']);

Route::get('/console', [App\Http\Controllers\ConsoleController::class, 'console_get'])->name('console_get');

Route::any('/console/fiche-inscription', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription'])->name('fiche-inscription');
Route::get('/console/fiche-inscription-modifier', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_modifier_get'])->name('fiche-inscription-modifier_get');
Route::post('/console/fiche-inscription-modifier', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_modifier_post'])->name('fiche-inscription-modifier_post');
Route::post('/console/fiche-inscription-details', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_details_post'])->name('fiche-inscription-details_post');

Route::view('/console/notation-dev', 'notation-dev');

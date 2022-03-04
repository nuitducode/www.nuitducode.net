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

Route::get('/ndc/{token}', [App\Http\Controllers\SiteController::class, 'jeux'])->name('jeux_get');
Route::get('/sltn/{token}', [App\Http\Controllers\SiteController::class, 'jeux'])->name('jeux_get');
Route::get('/bas/{token}', [App\Http\Controllers\SiteController::class, 'jeux'])->name('jeux_get');
Route::get('/ndc', [App\Http\Controllers\SiteController::class, 'redirect']);
Route::get('/sltn', [App\Http\Controllers\SiteController::class, 'redirect']);
Route::get('/bas', [App\Http\Controllers\SiteController::class, 'redirect']);
Route::get('/ndc', [App\Http\Controllers\SiteController::class, 'redirect']);
Route::post('/ndc/jeu-creer', [App\Http\Controllers\SiteController::class, 'jeu_creer_post'])->name('ndc-jeu-creer_post');
Route::post('/sltn/jeu-creer', [App\Http\Controllers\SiteController::class, 'jeu_creer_post'])->name('sltn-jeu-creer_post');
Route::post('/bas/jeu-creer', [App\Http\Controllers\SiteController::class, 'jeu_creer_post'])->name('bas-jeu-creer_post');
Route::post('/ndc/evaluation', [App\Http\Controllers\SiteController::class, 'evaluation_etape_1_post'])->name('evaluation-etape-1_post');
Route::post('/ndc/evaluation-creer', [App\Http\Controllers\SiteController::class, 'evaluation_etape_2_post'])->name('evaluation-etape-2_post');



// ============================================================================
// == CONSOLE
// ============================================================================

// JEUX & EVALUATIONS
Route::view('/console/ndc', 'jeux-console')->middleware('auth');
Route::view('/console/sltn', 'jeux-console')->middleware('auth');
Route::view('/console/bas', 'jeux-console')->middleware('auth');
Route::view('/console/ndc/jeux-evaluations', 'jeux-evaluations')->middleware('auth');
Route::view('/console/sltn/jeux-evaluations', 'jeux-evaluations')->middleware('auth');
Route::view('/console/bas/jeux-evaluations', 'jeux-evaluations')->middleware('auth');
Route::view('/console/ndc/liste-jeux', 'liste-jeux')->middleware('auth');
Route::view('/console/sltn/liste-jeux', 'liste-jeux')->middleware('auth');
Route::view('/console/bas/liste-jeux', 'liste-jeux')->middleware('auth');
Route::view('/console/ndc/liste-evaluations', 'liste-evaluations')->middleware('auth');
Route::view('/console/sltn/liste-evaluations', 'liste-evaluations')->middleware('auth');
Route::view('/console/bas/liste-evaluations', 'liste-evaluations')->middleware('auth');

// supprimer jeu
Route::any('/console/supprimer-jeu', [App\Http\Controllers\ConsoleController::class, 'redirect']);
Route::any('/console/supprimer-jeu/{jeu_id}', [App\Http\Controllers\ConsoleController::class, 'supprimer_jeu'])->name('supprimer-jeu');

// supprimer evaluation
Route::any('/console/supprimer-evaluation', [App\Http\Controllers\ConsoleController::class, 'redirect']);
Route::any('/console/supprimer-evaluation/{evaluation_id}', [App\Http\Controllers\ConsoleController::class, 'supprimer_evaluation'])->name('supprimer-evaluation');

Route::post('/console/jeu-ajouter', [App\Http\Controllers\ConsoleController::class, 'jeux_lot_ajouter_post'])->name('jeux-lot-ajouter_post');

// jeton generator - inutile l'an prochain
Route::get('/console/jetons-generator', [App\Http\Controllers\ConsoleController::class, 'jetons_generator']);

Route::get('/console', [App\Http\Controllers\ConsoleController::class, 'console_get'])->name('console_get');

Route::any('/console/fiche-inscription', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription'])->name('fiche-inscription');
Route::get('/console/fiche-inscription-modifier', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_modifier_get'])->name('fiche-inscription-modifier_get');
Route::post('/console/fiche-inscription-modifier', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_modifier_post'])->name('fiche-inscription-modifier_post');
Route::post('/console/fiche-inscription-details', [App\Http\Controllers\ConsoleController::class, 'fiche_inscription_details_post'])->name('fiche-inscription-details_post');

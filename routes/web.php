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

// DONNEE PERSONNELLES
Route::view('/donnees-personnelles', 'donnees-personnelles')->name('donnees-personnelles');

// PRESENTATION
Route::view('/presentation', 'presentation');

// CONSIGNES
Route::view('/consignes', 'consignes');

// ORGANISATION
Route::view('/organisation', 'organisation');

// TEST
Route::view('/test', 'test');


// ============================================================================
// == CONSOLE
// ============================================================================



Route::get('/console', [App\Http\Controllers\ConsoleController::class, 'console_get'])->name('console_get');

Route::get('/console/renseignements-modifier', [App\Http\Controllers\ConsoleController::class, 'renseignements_modifier_get'])->name('renseignements-modifier_get');
Route::post('/console/renseignements-modifier', [App\Http\Controllers\ConsoleController::class, 'renseignements_modifier_post'])->name('renseignements-modifier_post');

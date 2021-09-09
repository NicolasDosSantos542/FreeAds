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


Route::get('/inscription', function () {
    return view('inscription');
});
Route::post('/inscription', [\App\Http\Controllers\InscriptionController::class, 'inscrire']);

Route::get('/liste', [\App\Http\Controllers\UtilisateursController::class, 'liste']);

Route::get('/', [\App\Http\Controllers\AnnonceController::class, 'displayAll']);

Route::get('/utilisateurs/{email}', [\App\Http\Controllers\UtilisateursController::class, 'voir']);

Route::get('connexion', [\App\Http\Controllers\ConnexionController::class, 'formulaire']);
Route::post('connexion', [\App\Http\Controllers\ConnexionController::class, 'traitement']);

Route::group([
    'middleware' => 'App\Http\Middleware\Auth',
], function () {
    Route::get('/mon-compte', [\App\Http\Controllers\CompteController::class, 'accueil']);
    Route::get('/deconnexion', [\App\Http\Controllers\CompteController::class, 'deconnexion']);
    Route::post('/modification-password', [\App\Http\Controllers\CompteController::class, 'modificationPassword']);
    Route::post('/modification-name', [\App\Http\Controllers\CompteController::class, 'changeName']);
    Route::post('/modification-email', [\App\Http\Controllers\CompteController::class, 'changeEmail']);
    Route::post('/annonces', [\App\Http\Controllers\AnnonceController::class, 'nouveau']);
    Route::get('/annonces/{annonce_id}', [\App\Http\Controllers\AnnonceController::class, 'displaySingle']);
    Route::get('/utilisateurs/{annonce_id}/change', [\App\Http\Controllers\AnnonceController::class, 'displayChangeSingle']);
    Route::get('/utilisateurs/delete/{id}', [\App\Http\Controllers\AnnonceController::class, 'deleteAnnonce']);
    Route::post('/changeAnnonce/{id}', [\App\Http\Controllers\AnnonceController::class, 'changeAnnonce']);



});




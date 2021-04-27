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


use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormulaireController;
use App\Http\Controllers\RecettesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CommentaireController;
use \App\Http\Controllers\ImageTroisRecettes;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipesController;
use App\Http\Controllers\ImageController;
use \App\Http\Controllers\AdminController;








Route::get('/recettes', [HomeController::class, 'afficherRecettes']);
Route::get('/contact', [FormulaireController::class, 'pageContact'])->name('contact');
Route::get('/recettes/{url}', [RecipesController::class, 'show']);

Route::post('/contact/enregistrer', [FormulaireController::class, 'enregistrer']);

Route::resource('/admin/recettes', RecettesController::class);
Route::resource('/commentaire', CommentaireController::class);
Route::resource('/image',ImageController::class);
Route::resource('/imageRecettes',ImageTroisRecettes::class);
Route::resource('/adminPages',AdminController::class);

/////////////////////
Route::get('/', function () {
    return view('pageAccueil');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard',
    [HomeController::class,'afficher3DernieresRecettes'])->name('dashboard');


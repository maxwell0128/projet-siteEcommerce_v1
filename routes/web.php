<?php

use App\Http\Controllers\adminvueController;
use App\Http\Controllers\VueController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [VueController::class, 'accueil']);
Route::get('/about', [VueController::class, 'about'])->name('app_about');
Route::get('/achat', [VueController::class, 'achat'])->name('app_achat');
Route::get('/contact', [VueController::class, 'contact'])->name('app_contact');


/*******route admin***** */
/**admin**/
//route acceuil admin
Route::get('/home_admin', [adminvueController::class, 'vueadmin'])
    ->middleware('auth')
    ->name('app_admin');
//route modifier info admin
Route::get('/profile/{id}',[adminvueController::class, 'profile'])
    ->middleware('auth')
    ->name('app_profile');


/**route categorie**/
//route ajoutez categorie
Route::get('/ajout_categorie',[adminvueController::class, 'ajouter_categorie'])
    ->middleware('auth')
    ->name('app_categorie');
// ajouter une categorie
Route::post('/ajout_categorie/ajouter',[adminvueController::class, 'ajoutercategorie'])
    ->middleware('auth')
    ->name('app_ajoutez_categorie');

//route liste categorie
Route::get('/categorie_list',[adminvueController::class, 'categorie_list'])
    ->middleware('auth')
    ->name('app_categorie_list');

//route modifier categorie
Route::get('/Modify_categorie/{id}',[adminvueController::class, 'Modify_categorie'])
    ->middleware('auth');

// modifier une categorie
Route::post('/Modify_categorie_trait',[adminvueController::class, 'Modify_categorie_tait'])
->middleware('auth')
->name('Modify_categorie_trait');

//route supprimer categorie
Route::get('/Delete_categorie/{id}',[adminvueController::class, 'Delete_categorie'])
    ->middleware('auth');

//route liste categorie en fonction des produits
Route::get('/categorie_produit',[adminvueController::class, 'categorie_produit'])
    ->middleware('auth')
    ->name('app_categorie_produit');

//route liste genre produit
Route::get('/genre_produit',[adminvueController::class, 'genre_produit'])
    ->middleware('auth')
    ->name('app_genre_produit');


/**route produits**/
//route ajoutez produits
Route::get('/ajout_produit',[adminvueController::class, 'ajouter_produits'])
    ->middleware('auth')
    ->name('app_produit');

//ajoutez produits
Route::post('/ajout_produit/ajoutez',[adminvueController::class, 'ajouterproduits'])
    ->middleware('auth')
    ->name('app_ajoutez_produit');

//route liste produit
Route::get('/produit_list',[adminvueController::class, 'produit_list'])
    ->middleware('auth')
    ->name('app_produit_list');

//route modifier produit
Route::get('/Modify_produit/{id}',[adminvueController::class, 'Modify_produit'])
    ->middleware('auth');
// modifier une produits
Route::post('/Modify_produit_trait',[adminvueController::class, 'Modify_produit_tait'])
->middleware('auth')
->name('Modify_produit_trait');

//route supprimer produits
Route::get('/Delete_produit/{id}',[adminvueController::class, 'Delete_produits'])
    ->middleware('auth');

// route deconnexion
Route::get('deco',[adminvueController::class, 'deconnexion'])->name('deconnexion');



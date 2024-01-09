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
Route::get('/home_admin', [adminvueController::class, 'vueadmin'])
    ->middleware('auth')
    ->name('app_admin');
Route::get('deco',[adminvueController::class, 'deconnection'])->name('deconection');

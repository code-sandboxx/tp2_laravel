<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\CustomAuthController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('repertoire-etudiants', [EtudiantController::class, 'index'])->name('etudiant.index');

Route::get('etudiant-create', [EtudiantController::class, 'create'])->name('etudiant.create');

Route::post('etudiant-create', [EtudiantController::class, 'store']);

Route::get('etudiant/{etudiant}', [EtudiantController::class, 'show'])->name('etudiant.show');

Route::get('etudiant-edit/{etudiant}', [EtudiantController::class, 'edit'])->name('etudiant.edit');

Route::put('etudiant-edit/{etudiant}', [EtudiantController::class, 'update']);

Route::delete('etudiant/{etudiant}', [EtudiantController::class, 'destroy']);

Route::get('/login', [CustomAuthController::class, 'index'])->name('login');

Route::post('/login', [CustomAuthController::class, 'authentication'])->name('login.authentication');

Route::get('/registration', [CustomAuthController::class, 'create'])->name('user.registration');

Route::post('/registration', [CustomAuthController::class, 'store']);

Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');
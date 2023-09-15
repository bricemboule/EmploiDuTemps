<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
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



Route::get('/', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authLogin']);
Route::get('/logout', [AuthController::class, 'authlogout']);
Route::get('admin/dashboard', function(){

    return view('layouts.master');
});

Route::group(['middleware'=> 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/utilisateur/ajouter', [AdminController::class, 'ajouter']);
    Route::post('admin/utilisateur/creer', [AdminController::class, 'inserer']);
    Route::get('admin/utilisateur/modifier/{id}', [AdminController::class, 'modifier']);
    

    Route::get('admin/user', [DashboardController::class, 'dashboard']);
    Route::get('admin/enseignant', [DashboardController::class, 'dashboard']);
    Route::get('admin/etudiant', [DashboardController::class, 'dashboard']);
    Route::get('admin/cours', [DashboardController::class, 'dashboard']);
    Route::get('admin/parent', [DashboardController::class, 'dashboard']);
    Route::get('admin/classe', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'directeurAcademique'], function(){
    Route::get('dac/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'directeurGenerale'], function(){
    Route::get('dg/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'gestionnaireScolarite'], function(){
    Route::get('scolarite/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'gestionnaireStock'], function(){
    Route::get('stock/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'gestionnaireCahierTexte'], function(){
    Route::get('cahierTexte/dashboard', [DashboardController::class, 'dashboard']);
});

Route::group(['middleware'=> 'etudiant'], function(){
    Route::get('etudiant/dashboard', [DashboardController::class, 'dashboard']);
   
});

Route::group(['middleware'=> 'enseignant'], function(){
    Route::get('enseigant/dashboard', [DashboardController::class, 'dashboard']);
});
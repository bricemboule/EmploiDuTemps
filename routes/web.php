<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ClasseController;
use App\Http\Controllers\admin\CourController;
use App\Http\Controllers\admin\EnseignantController;
use App\Http\Controllers\admin\EtudiantController;
use App\Http\Controllers\admin\ParentController;
use App\Http\Controllers\admin\SalleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\scolarite\CalendarController;
use App\Http\Controllers\scolarite\LessonController;
use App\Http\Controllers\scolarite\ScolariteClasseController;
use App\Http\Controllers\scolarite\ScolariteCourController;
use App\Http\Controllers\scolarite\TimeTableController;
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


Route::group(['middleware'=> 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    //Utilisateur
    Route::get('admin/utilisateur/ajouter', [AdminController::class, 'ajouter']);
    Route::post('admin/utilisateur/creer', [AdminController::class, 'inserer']);
    Route::get('admin/utilisateur/modifier/{id}', [AdminController::class, 'modifier']);
    Route::post('admin/utilisateur/modifier/{id}', [AdminController::class, 'edit']);
    Route::get('admin/utilisateur/lister', [AdminController::class, 'lister']);
    Route::get('admin/utilisateur/supprimer/{id}', [AdminController::class, 'delete']);
    
    //Salles
    Route::get('admin/salle/ajouter', [SalleController::class, 'ajouter']);
    Route::post('admin/salle/creer', [SalleController::class, 'inserer']);
    Route::get('admin/salle/modifier/{id}', [SalleController::class, 'modifier']);
    Route::post('admin/salle/modifier/{id}', [SalleController::class, 'edit']);
    Route::get('admin/salle/lister', [SalleController::class, 'lister']);
    Route::get('admin/salle/supprimer/{id}', [SalleController::class, 'delete']);

    //Classes
    Route::get('admin/classe/ajouter', [ClasseController::class, 'ajouter']);
    Route::post('admin/classe/creer', [ClasseController::class, 'inserer']);
    Route::get('admin/classe/modifier/{id}', [ClasseController::class, 'modifier']);
    Route::post('admin/classe/modifier/{id}', [ClasseController::class, 'edit']);
    Route::get('admin/classe/lister', [ClasseController::class, 'lister']);
    Route::get('admin/classe/supprimer/{id}', [ClasseController::class, 'delete']);

    //Cours
    Route::get('admin/cours', [DashboardController::class, 'dashboard']);
    Route::get('admin/cours/ajouter', [CourController::class, 'ajouter']);
    Route::post('admin/cours/creer', [CourController::class, 'inserer']);
    Route::get('admin/cours/modifier/{id}', [CourController::class, 'modifier']);
    Route::post('admin/cours/modifier/{id}', [CourController::class, 'edit']);
    Route::get('admin/cours/lister', [CourController::class, 'lister']);
    Route::post('admin/cours/delete/{id}', [CourController::class, 'delete']);

     //Enseignant
     Route::get('admin/enseignant/ajouter', [EnseignantController::class, 'ajouter']);
     Route::post('admin/enseignant/creer', [EnseignantController::class, 'inserer']);
     Route::get('admin/enseignant/modifier/{id}', [EnseignantController::class, 'modifier']);
     Route::post('admin/enseignant/modifier/{id}', [EnseignantController::class, 'edit']);
     Route::get('admin/enseignant/{id}/cours', [EnseignantController::class, 'cours']);
     Route::get('admin/enseignant/lister', [EnseignantController::class, 'lister']);
     Route::get('admin/enseignant/supprimer/{id}', [EnseignantController::class, 'delete']);

      //Etudiant
    Route::get('admin/etudiant/ajouter', [EtudiantController::class, 'ajouter']);
    Route::post('admin/etudiant/creer', [EtudiantController::class, 'inserer']);
    Route::get('admin/etudiant/modifier/{id}', [EtudiantController::class, 'modifier']);
    Route::post('admin/etudiant/modifier/{id}', [EtudiantController::class, 'edit']);
    Route::get('admin/etudiant/lister', [EtudiantController::class, 'lister']);
    Route::get('admin/etudiant/supprimer/{id}', [EtudiantController::class, 'delete']);

     //Parent
     Route::get('admin/parent/ajouter', [ParentController::class, 'ajouter']);
     Route::post('admin/parent/creer', [ParentController::class, 'inserer']);
     Route::get('admin/parent/modifier/{id}', [ParentController::class, 'modifier']);
     Route::post('admin/parent/modifier/{id}', [ParentController::class, 'edit']);
     Route::get('admin/parent/lister', [ParentController::class, 'lister']);
     Route::get('admin/parent/supprimer/{id}', [ParentController::class, 'delete']);

    Route::get('admin/user', [DashboardController::class, 'dashboard']);
    Route::get('admin/enseignant', [DashboardController::class, 'dashboard']);
    Route::get('admin/etudiant', [DashboardController::class, 'dashboard']);
    
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

    //Emploi du temps

    Route::get('scolarite/emploiDuTemps/programmer', [TimeTableController::class, 'programmer']);
    Route::get('scolarite/emploiDuTemps/ajouter', [LessonController::class, 'ajouterL1']);
    //Route::get('scolarite/timetable/L1', [TimeTableController::class, 'ListerL1']);
    Route::get('scolarite/emploiDuTemps/L1', [LessonController::class, 'lister']);
    Route::get('scolarite/emploiDuTemps/afficher', [CalendarController::class, 'index']);
    Route::get('scolarite/emploiDuTemps/L1/calendrier', [CalendarController::class, 'calendrier']);
    Route::get('scolarite/emploiDuTemps/envoyer/etudiant/', [LessonController::class, 'etudiant']);
    Route::get('scolarite/emploiDuTemps/envoyer/enseignant/', [LessonController::class, 'enseignant']);
    Route::get('scolarite/emploiDuTemps/envoyer/etudiant/{id}', [CalendarController::class, 'etudiant']);
    Route::get('scolarite/emploiDuTemps/envoyer/enseignant/{id}', [CalendarController::class, 'enseignant']);
    Route::get('scolarite/emploiDuTemps/visualiser/etudiant/{id}', [CalendarController::class, 'visualiser']);
    Route::get('scolarite/emploiDuTemps/visualiserEnseignant/{id}', [CalendarController::class, 'visualiserEnseignant']);
    Route::get('scolarite/emploiDuTemps/L1/modifier/{id}', [LessonController::class, 'modifier']);
    Route::post('scolarite/emploiDuTemps/L1/modifier/{id}', [LessonController::class, 'edit']);
    Route::post('scolarite/emploiDuTemps/L1/programmer', [LessonController::class, 'save']);
    Route::get('scolarite/emploiDuTemps/L2', [TimeTableController::class, 'ListerL2']);
    Route::get('scolarite/emploiDuTemps/L3', [TimeTableController::class, 'ListerL3']);
    Route::get('scolarite/emploiDuTemps/M1ACT', [TimeTableController::class, 'ListerM1ACT']);

    //Cours
    Route::get('scolarite/cours', [DashboardController::class, 'dashboard']);
    Route::get('scolarite/cours/ajouter', [ScolariteCourController::class, 'ajouter']);
    Route::post('scolarite/cours/creer', [ScolariteCourController::class, 'inserer']);
    Route::get('scolarite/cours/modifier/{id}', [ScolariteCourController::class, 'modifier']);
    Route::post('scolarite/cours/modifier/{id}', [ScolariteCourController::class, 'edit']);
    Route::get('scolarite/cours/lister', [ScolariteCourController::class, 'lister']);
    Route::post('scolarite/cours/delete/{id}', [ScolariteCourController::class, 'delete']);

     //Classes
     Route::get('scolarite/classe/ajouter', [ScolariteClasseController::class, 'ajouter']);
     Route::post('scolarite/classe/creer', [ScolariteClasseController::class, 'inserer']);
     Route::get('scolarite/classe/modifier/{id}', [ScolariteClasseController::class, 'modifier']);
     Route::post('scolarite/classe/modifier/{id}', [ScolariteClasseController::class, 'edit']);
     Route::get('scolarite/classe/lister', [ScolariteClasseController::class, 'lister']);
     Route::get('scolarite/classe/supprimer/{id}', [ScolariteClasseController::class, 'delete']);

    //Enseignant
    Route::get('scolarite/enseignant/ajouter', [EnseignantController::class, 'ajouter']);
    Route::post('scolarite/enseignant/creer', [EnseignantController::class, 'inserer']);
    Route::get('scolarite/enseignant/modifier/{id}', [EnseignantController::class, 'modifier']);
    Route::post('scolarite/enseignant/modifier/{id}', [EnseignantController::class, 'edit']);
    Route::get('scolarite/enseignant/lister', [EnseignantController::class, 'lister']);
    Route::get('scolarite/enseignant/supprimer/{id}', [EnseignantController::class, 'delete']);

     //Etudiant
   Route::get('scolarite/etudiant/ajouter', [EtudiantController::class, 'ajouter']);
   Route::post('scolarite/etudiant/creer', [EtudiantController::class, 'inserer']);
   Route::get('scolarite/etudiant/modifier/{id}', [EtudiantController::class, 'modifier']);
   Route::post('scolarite/etudiant/modifier/{id}', [EtudiantController::class, 'edit']);
   Route::get('scolarite/etudiant/lister', [EtudiantController::class, 'lister']);
   Route::get('scolarite/etudiant/supprimer/{id}', [EtudiantController::class, 'delete']);

    //Parent
    Route::get('scolarite/parent/ajouter', [ParentController::class, 'ajouter']);
    Route::post('scolarite/parent/creer', [ParentController::class, 'inserer']);
    Route::get('scolarite/parent/modifier/{id}', [ParentController::class, 'modifier']);
    Route::post('scolarite/parent/modifier/{id}', [ParentController::class, 'edit']);
    Route::get('scolarite/parent/lister', [ParentController::class, 'lister']);
    Route::get('scolarite/parent/supprimer/{id}', [ParentController::class, 'delete']);
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
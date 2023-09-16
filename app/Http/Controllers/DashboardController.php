<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function dashboard(){

        $user = DB::table('users')
                            ->where('status', 1)
                            ->count();

        $salle = DB::table('salles')
                            ->where('status', 1)
                            ->count();

        $enseignant = DB::table('users')
                            ->where('status', 1)
                            ->count();

         $etudiant = DB::table('users')
                            ->where('status', 1)
                            ->count();

        $specialite = DB::table('specialites')
                            ->where('status', 1)
                            ->count();

        switch (Auth::user()->role->intitule) {
            case 'admin' : 
                return view('admin.dashboard', compact(['user','salle', 'enseignant', 'etudiant','specialite']));
                break;
            case 'directeur general' :
                return view('dg.dashboard');
                break;
            case 'directeur academique' :
                return view('dac.dashboard');
                break;
            case 'gestionnaire scolarite' :
                return view('scolarite.dashboard');
                break;
            case 'gestionnaire stock' :
                return view('stock.dashboard');
                break;
            case 'etudiant' :
                return view('etudiant.dashboard');
                break;
            case 'enseignant' :
                return view('enseignant.dashboard');
                break;
            case 'gestionnaire cahier texte' :
                return view('cahierTexte.dashboard');
                break;
            default :
                return redirect()->back()->with('error', 'Veuillez entrer les informations correctes');
        }
    }
}

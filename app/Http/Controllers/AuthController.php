<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(){

        return view('welcome');
    }

    public function authLogin(Request $request){
       
        $remember = !empty($request->remember) ? true : false;
        if(Auth::attempt(['login'=>$request->login, 'password'=>$request->password], true)){
           

            switch (Auth::user()->role->intitule) {
                case 'admin' : 
                    return redirect('admin/dashboard');
                    break;
                case 'directeur general' :
                    return redirect('dg/dashboard');
                    break;
                case 'directeur academique' :
                    return redirect('dac/dashboard');
                    break;
                case 'gestionnaire scolarite' :
                    return redirect('scolarite/dashboard');
                    break;
                case 'gestionnaire stock' :
                    return redirect('stock/dashboard');
                    break;
                case 'etudiant' :
                    return redirect('etudiant/dashboard');
                    break;
                case 'enseignant' :
                    return redirect('enseignant/dashboard');
                    break;
                case 'gestionnaire cahier texte' :
                    return redirect('cahierTexte/dashboard');
                    break;
                default :
                    return redirect()->back()->with('error', 'Veuillez entrer les informations correctes');
            }

        }else{
            return redirect()->back()->with('error', 'Veuillez entrer les informations correctes');
        }
        
    }

    public function authLogout(){
        Auth::logout();
        return redirect(url(''));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login(){

      if (!empty(Auth::check())){
        return redirect('admin/dashboard');
      }
        return view('welcome');
    }

    public function authLogin(Request $resquest){

        $remember = !empty($resquest->remeber) ? true : false;
        if(Auth::attempt(['login'=>$resquest->login, 'password'=>$resquest->password], $remember)){
        
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

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;

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
            return redirect('admin/dashboard');

        }else{
            return redirect()->back()->with('error', 'Veuillez entrer les informations correctes');
        }
        
    }

    public function authLogout(){
        Auth::logout();
        return redirect(url(''));
    }
}

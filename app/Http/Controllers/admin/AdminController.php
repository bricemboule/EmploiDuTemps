<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function ajouter(){

        $roles = Role::all();
        return view('admin.ajouter',compact('roles'));
    }

    public function inserer(Request $request){

        $user = new User();
        $role = Role::where('intitule', $request->role)->first();
        dd($request->telephone);

        $user->nom = trim($request->nom);
        $user->prenom = trim($request->prenom);
        $user->telephone = $request->phone;
        $user->login = trim($request->login);
        $user->password =Hash::make( $request->nom);
        $user->email = trim($request->email);
        $user->role_id = $role->id;
        $user->photo = trim($request->photo);
        dd($user);
        $user->save();

    }

    public function modifier($id){


    }
}

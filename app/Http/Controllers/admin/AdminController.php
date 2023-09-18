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
        
        return view('admin.utilisateur.ajouter',compact('roles'));
    }

    public function inserer(Request $request){
        
        request()->validate(['email'=> 'required|unique:users,email']);
        $user = new User();
        $role = Role::where('intitule', $request->role)->first();
      

        $user->nom = trim($request->nom);
        $user->prenom = trim($request->prenom);
        $user->telephone = $request->phone;
        $user->login = trim($request->login);
        $user->password =Hash::make($request->password);
        $user->email = trim($request->email);
        $user->role_id = $role->id;
        $user->photo = trim($request->photo);
       
        $user->save();

        return redirect('admin/utilisateur/lister');

    }

    public function modifier($id){
        $user = User::find($id);
        $roles = Role::all();
       return view('admin.utilisateur.modifier', compact(['user', 'roles']));

    }

    public function lister(){
        $users = User::where('status', '1')->get();
        return view('admin.utilisateur.lister', compact('users'));
    }

    public function edit($id, Request $request){

        request()->validate(
            ['email'=> 'required|unique:users,email,'.$id
        ]);

        $user = User::find($id);
        $role = Role::where('intitule', $request->role)->first();
      

        $user->nom = trim($request->nom);
        $user->prenom = trim($request->prenom);
        $user->telephone = $request->phone;
        $user->login = trim($request->login);
        if(!empty($request->password)){
            $user->password =Hash::make( $request->nom);
        }
        $user->email = trim($request->email);
        $user->role_id = $role->id;
        $user->photo = trim($request->photo);
        $user->save();

        return redirect('admin/utilisateur/lister');
        
    }

    public function delete($id){

        $user = User::find($id);
        $user->status = 0;

        $user->save();

        return redirect('admin/utilisateur/lister');


    }
}

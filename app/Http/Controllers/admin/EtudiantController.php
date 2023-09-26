<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EtudiantController extends Controller
{
     public function ajouter(){

        $classes = Classe::all();
        
        return view('admin.etudiant.ajouter',compact('classes'));
    }

    public function inserer(Request $request){
        //dd($request->all());
        request()->validate(['email'=> 'required|unique:users,email']);
        $etudiant = new User();
        $classe = Classe::where('intitule', $request->classe)->first();
        $role = Role::where('intitule', 'etudiant')->first();
        $etudiant->nom = trim($request->nom);
        $etudiant->prenom = trim($request->prenom);
        $etudiant->dateNaissance = trim($request->date);
        $etudiant->lieu = trim($request->lieu);
        $etudiant->classe_id = $classe->id;
        $etudiant->telephone = $request->phone;
        $etudiant->login = trim($request->login);
        $etudiant->password =Hash::make( $request->nom);
        $etudiant->email = trim($request->email);
        $etudiant->role_id = $role->id;
        $extension = $request->file('photo')->getClientOriginalExtension();
        $file = $request->file('photo');
        $randomStr = date('Ymdhis').Str::random();
        $filenane = strtolower($randomStr).'.'.$extension;

        $file->move('public\images\etudiant/', $filenane);

        $etudiant->photo = $filenane;

        $etudiant->save();

        return redirect('admin/etudiant/lister');

    }

    public function modifier($id){
        $etudiant = User::find($id);
        $classes = Classe::all();
       return view('admin.etudiant.modifier', compact(['etudiant', 'classes']));

    }

    public function lister(){

        $role = Role::where('intitule', 'etudiant')->first();
        
        $etudiants = User::where('status', '1')
                            ->where('role_id', $role->id)
                            ->with('classe')
                            ->get();

       
        return view('admin.etudiant.lister', compact('etudiants'));
    }

    public function edit($id, Request $request){

        request()->validate(
            ['email'=> 'required|unique:users,email,'.$id
        ]);

        $etudiant = User::find($id);
        //$role =Classe::where('intitule', $request->role)->first();
        $classe = Classe::where('intitule', $request->classe)->first();
      

        $etudiant->nom = trim($request->nom);
        $etudiant->prenom = trim($request->prenom);
        $etudiant->date = trim($request->date);
        $etudiant->lieu = trim($request->lieu);
        $etudiant->classe_id = $classe->id;
        $etudiant->telephone = $request->phone;
        $etudiant->login = trim($request->login);
        $etudiant->password =Hash::make( $request->nom);
        $etudiant->email = trim($request->email);
        if(!empty($request->photo)){
            $extension = $request->file('photo')->getClientOriginalExtension();
        $file = $request->file('photo');
        $randomStr = date('Ymdhis').Str::random();
        $filenane = strtolower($randomStr).'.'.$extension;

        $file->move('public\images\etudiant/', $filenane);

        $etudiant->photo = $filenane;
        }

        $etudiant->save();

        return redirect('admin/etudiant/lister');
        
    }

    public function delete($id){

        $etudiant = User::find($id);
        $etudiant->status = 0;

        $etudiant->save();

        return redirect('admin/etudiant/lister');


    }
}

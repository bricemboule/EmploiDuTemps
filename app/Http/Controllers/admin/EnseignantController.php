<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\Cour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EnseignantController extends Controller
{
    public function ajouter(){        
        return view('admin.enseignant.ajouter');
    }

    public function inserer(Request $request){
        //dd($request);
        request()->validate(['email'=> 'required|unique:users,email']);
       $enseignant = new User();
        $role = Role::where('intitule', 'enseignant')->first();
      

        $enseignant->nom = trim($request->nom);
        $enseignant->prenom = trim($request->prenom);
        $enseignant->telephone = trim($request->phone);
        $enseignant->telephone2 = trim($request->phone2);
        $enseignant->grade = trim($request->grade);
        $enseignant->login = trim($request->login);
        $enseignant->password =Hash::make( $request->nom);
        $enseignant->email = trim($request->email);
        $enseignant->role_id = $role->id;
       
        $enseignant->save();

        return redirect('admin/enseignant/lister');

    }

    public function modifier($id){
        $enseignant = User::find($id);
       
       return view('admin.enseignant.modifier', compact(['enseignant']));

    }

    public function lister(){
        $role = Role::where('intitule', 'enseignant')->first();
        $enseignants = User::where('status', '1')
                            ->where('role_id', $role->id)
                            ->get();
        
        return view('admin.enseignant.lister', compact('enseignants'));
    }

    public function edit($id, Request $request){

        request()->validate(
            ['email'=> 'required|unique:enseignants,email,'.$id
        ]);

        $enseignant = User::find($id);
        $role = Role::where('intitule', 'enseignant')->first();
      

        $enseignant->nom = trim($request->nom);
        $enseignant->prenom = trim($request->prenom);
        $enseignant->telephone = trim($request->phone);
        $enseignant->telephone2 = trim($request->phone2);
        $enseignant->grade = trim($request->grade);
        $enseignant->login = trim($request->login);
        if(!empty($request->password)){
            $enseignant->password =Hash::make( $request->nom);
        }
        $enseignant->email = trim($request->email);
        $enseignant->role_id = $role->id;
        $enseignant->photo = trim($request->photo);
        $enseignant->save();

        return redirect('admin/enseignant/lister');
        
    }

    public function delete($id){

        $enseignant = User::find($id);
        $enseignant->status = 0;

        $enseignant->save();

        return redirect('admin/enseignant/lister');


    }

    public function cours($id){

        $cours = Cour::with('classes')->where('user_id', $id)->get();
        return view('admin.enseignant.cours', compact('cours'));
    }
}

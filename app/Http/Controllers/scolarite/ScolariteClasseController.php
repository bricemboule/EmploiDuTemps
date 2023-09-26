<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Specialite;

class ScolariteClasseController extends Controller
{
    public function ajouter(){

        $specialites = Specialite::all();
    

        return view('scolarite.classes.ajouter', compact('specialites'));
    }

    public function inserer(Request $request){
      
        $classe = new Classe();
        $specialite = Specialite::where('intitule', $request->specialite)->first();
      
        $classe->code = $request->code;
        $classe->intitule = $request->intitule;
        $classe->cycle = $request->cycle;
        $classe->specialite_id = $specialite->id;
        $classe->save();

        return redirect('scolarite/classe/lister');

    }

    public function lister(){

        $classes = Classe::where('status', '1')->get();
        return view('admin.classes.lister', compact('classes'));

    }

    public function modifier($id){

        $classe = Classe::find($id)->first();
        $specialites = Specialite::all();

        return view('admin.classes.modifier', compact(['classe','specialites']));
    }

    public function edit($id, Request $request){
        
        $classe = Classe::find($id)->first();
        $specialite = Specialite::where('intitule', $request->specialite)->first();
      
        $classe->code = $request->code;
        $classe->intitule = $request->intitule;
        $classe->cycle = $request->cycle;
        $classe->specialite_id = $specialite->id;

        
        $classe->save();

        return redirect('admin/classe/lister');
    }

    public function delete($id){

        $classe = Classe::find($id)->first();

        $classe->status = 0; 

        $classe->save();

        return redirect('admin/classe/lister');
    }
}

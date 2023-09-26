<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Suivre;
use App\Models\User;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function ajouter(){

        $classes = Classe::where('status', '1')->get();
        $enseignants = User::with('role')->where('status', '1')->get();

        return view('admin.cours.ajouter', compact(['classes', 'enseignants']));
    }

    public function lister(){
        $cours = Cour::with('classes','user')->get();
        
        return view('admin.cours.lister', compact('cours'));
    }

    public function inserer(Request $request){
       
        $cour = new Cour();
        $cour->code = $request->code;
        $cour->libelle = $request->intitule;
        $cour->semestre = $request->semestre;
        $cour->volumeHoraire = $request->volume;
        $cour->restant = $request->volume;
        $cour->user_id = $request->enseignant;

        $cour->save();

        $c = Cour::where('code', $request->code)->first();

        if(!empty($request->classe)){
            foreach ($request->classe as $cl){
               $suivre = new Suivre();
               $suivre->cour_id = $c->id;
               $suivre->classe_id = $cl;
               $suivre->save();
            }
        }
        
        return redirect('admin/cours/lister');

    }



    public function modifier($id){

        $cour= Cour::find($id)->first();
        $classes = Classe::where('status', '1')->get();

        return view('admin.cours.modifier', compact(['cour','classes']));
    }

    public function edit($id, Request $request){

        $cour = Cour::find($id)->first();
        $cour->code = $request->code;
        $cour->libelle = $request->intitule;
        $cour->semestre = $request->semestre;
        $cour->volumeHoraire = $request->volume;
        $cour->restant = $request->volume;

        $cour->save();
        return redirect('admin/cours/lister');
    }

    public function delete($id){
        $cour = Cour::find($id)->first();
        $cour->status = 0;

        $cour->save();

        return redirect('admin/cours/lister');
    }
}

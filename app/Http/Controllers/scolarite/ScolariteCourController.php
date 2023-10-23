<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\Suivre;
use App\Models\User;

class ScolariteCourController extends Controller
{
    public function ajouter(){

        $classes = Classe::where('status', '1')->orderByRaw('code')->get();
        $enseignants = User::with('role')->where('status', '1')->get();

        return view('scolarite.cours.ajouter', compact(['classes', 'enseignants']));
    }

    public function lister(){
        $cours = Cour::with('classes','user')->get();
        
        return view('scolarite.cours.lister', compact('cours'));
    }

    public function inserer(Request $request){
       
        $cour = new Cour();
        $cour->libelle = $request->intitule;
        $cour->semestre = $request->semestre;
        $cour->volumeHoraire = $request->volume;
        $cour->restant = $request->volume;
        $cour->user_id = $request->enseignant;

        $cour->save();

        $c = Cour::where('libelle', $request->intitule)->first();

        if(!empty($request->classe)){
            foreach ($request->classe as $cl){
               $suivre = new Suivre();
               $suivre->cour_id = $c->id;
               $suivre->classe_id = $cl;
               $suivre->save();
            }
        }
        
        return redirect('scolarite/cours/lister');

    }



    public function modifier($id){

        $cour= Cour::where('id',$id)->first();
        $classes = Classe::where('status', '1')->orderByRaw('code')->get();
        $enseignants = User::with('role')->where('status', '1')->get();

        return view('scolarite.cours.modifier', compact(['cour','classes','enseignants']));
    }

    public function edit($id, Request $request){

        $cour = Cour::where('id',$id)->first();
        $cour->libelle = $request->intitule;
        $cour->semestre = $request->semestre;
        $cour->volumeHoraire = $request->volume;
        $cour->restant = $request->volume;

        $cour->save();
        return redirect('scolarite/cours/lister');
    }

    public function delete($id){
        $cour = Cour::find($id)->first();
        $cour->status = 0;

        $cour->save();

        return redirect('scolarite/cours/lister');
    }
}

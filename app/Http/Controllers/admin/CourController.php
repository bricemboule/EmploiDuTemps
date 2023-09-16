<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cour;
use Illuminate\Http\Request;

class CourController extends Controller
{
    public function ajouter(){

        return view('admin.cours.ajouter');
    }

    public function lister(){
        $cours = Cour::all();

        return view('admin.cours.lister', compact('cours'));
    }

    public function inserer(Request $request){

        $cour = new Cour();
        $cour->code = $request->code;
        $cour->libelle = $request->intitule;
        $cour->semestre = $request->semestre;
        $cour->volumeHoraire = $request->volume;
        $cour->restant = $request->volume;

        $cour->save();
        return redirect('admin/cours/lister');

    }

    public function modifier($id){

        $cour= Cour::find($id)->first();

        return view('admin.cours.modifier', compact('cour'));
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

<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\EstProgrammer;
use App\Models\Salle;
use App\Models\Semaine;
use App\Models\Suivre;


class TimeTableController extends Controller
{
    public function ajouterL1(){

        $classe = Classe::where('code', 'L1')->first();
        dd($classe);
        $classeSuivre = Suivre::where('classe_id', $classe->id);
        dd($classeSuivre);
        $cours = Cour::where('status','1')->get();
        $salle = Salle::where('status', '1')->get();

        return view('scolarite.emploidetemps.ajouter', compact(['cours','salle']));
    }

    public function programmer(){

        return view('scolarite.emploidetemps.programmer');
    }

    public function programmerL1(Request $request){
        $prog = new EstProgrammer();
        $semaine = Semaine::where('status', '1')->first();

        $prog->semaine_id = $semaine->id;
        $prog->cour_id = $request->cours;
        $prog->salle_id = $request->salle;
        $prog->classe_id = '3';
        $prog->jour = $request->jour;
        $prog->heureDebut = $request->debut;
        $prog->heureFin = $request->fin;
        $prog->enseignant = "tegankong";

        $prog->save();

        return redirect('scolarite/timetable/L1');
    }

    public function listerL1(){

        /*$plan = Classe::with('courprogrammes')
                        ->with('salles')
                        ->where('intitule', 'Licence 1')
                        ->get();

                        dd($plan);*/

        $semaine = Semaine::where('status', '1')->first();
        $classe = Classe::where('intitule', 'Licence 1')->first();
        

        $progs = EstProgrammer::where('classe_id', $classe->id)
                                ->where('semaine_id', $semaine->id)
                                ->get();
        
        return view('scolarite.emploidetemps.lister', compact('progs'));

    }

    public function listerL2(){
        
    }

    public function listerL3(){
        
    }
}

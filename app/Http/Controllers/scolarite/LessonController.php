<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use App\Models\Classe;
use Illuminate\Http\Request;
use App\Models\Salle;
use App\Models\Cour;
use App\Models\Lesson;
use App\Models\Semaine;
use App\Models\Suivre;

class LessonController extends Controller
{
    public function ajouterL1(){

        $classe = Classe::where('code', 'L1')->first();
       
        $courSuivre = Suivre::where('classe_id', $classe->id)->get(['cour_id']);
        
        $cours = Cour::whereIn('id',$courSuivre)->where('status','1')->get();
        $salle = Salle::where('status', '1')->get();

        return view('scolarite.emploidetemps.ajouter', compact(['cours','salle']));
    }

    public function save(Request $request){
       
        $lesson = new Lesson();
        $classe = Classe::where('intitule', 'Licence 1')->first();
        $semaine = Semaine::where('status', '1')->first();
        $enseignant = Cour::where('id', $request->cours)->first();
       //dd($enseignant->user_id);
        $lesson->jour = $request->jour;
        $lesson->debut = $request->debut;
        $lesson->fin = $request->fin;
        $lesson->cour_id = $request->cours;
        $lesson->salle_id = $request->salle;
        $lesson->classe_id = $classe->id;
        $lesson->user_id= $enseignant->user_id;
        $lesson->semaine_id = $semaine->id;

        $lesson->save();
        return redirect('scolarite/emploiDuTemps/L1');

    }

    public function lister(){
        $lessons = Lesson::with('classe')
                            ->with('salle')
                            ->with('user')
                            ->get();
        //dd($lessons);
        //return redirect('scolarite/emploiDuTemps/afficher');
        return view('scolarite.emploidetemps.lister', compact('lessons'));
    
    }

    public function modifier($id){

        

        $lesson = Lesson::where('id',$id)->first();
        $cours = Cour::where('status','1')->get();
        $salle = Salle::where('status', '1')->get();
       

        return view('scolarite.emploidetemps.modifier', compact('lesson', 'cours','salle'));
    }

    public function etudiant(){

        $classes = Classe::where('status', '1')->get();

        return view('scolarite.emploidetemps.etudiant', compact('classes'));
    }

    public function enseignant(){
        $classes = Classe::where('status', '1')->get();

        return view('scolarite.emploidetemps.enseignant',compact('classes'));
    }
    
}

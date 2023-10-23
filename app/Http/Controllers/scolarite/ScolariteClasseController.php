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
        /*return response()->json([
            'status' => 200,
        ]);*/

        return redirect('scolarite/classe/lister');

    }

    public function lister(){

        $classes = Classe::where('status', '1')->orderByRaw('code')->get();
        $sorti = '';

        if ($classes->count() > 0) {
            $sorti .= '<table class= "table table-striped align-middle">
            
                        <thead>
                            <tr>
                                <td> N </td>
                                <td> Code </td>
                                <td> Intitule </td>
                                <td> Cycle </td>
                                <td> Specialite </td>
                                <td> Actions </td>
                            </tr>
                        </thead>
                        <tbody>';

                        foreach($classes as $key=>$cl){
                            $sorti .= '<tr>
                                            <td>' .$key. '</td>
                                            <td>' .$cl->code. '</td>
                                            <td>' .$cl->intitule. '</td>
                                            <td>' .$cl->cycle. '</td>
                                            <td>' .$cl->specialite. '</td>
                                            <td> 
                                                <a href="#" id=" '.$cl->id.' " class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editClasse"> <i  class="fa-solid fa-pen-to-square"></i> </a>
                                                <a href="#" id=" '.$cl->id.' " class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editClasse"> <i   class="fa-solid fa-trash-can"></i> </a>                                       
                                            </td>
                                        <tr>';
                        }
            $sorti .= '</tbody></table>';
            //echo $sorti; 
        }else {
            echo '<h1 class="text-center text-secondary my-5"> Aucune classe deja cree </h1>';
        }

        return view('scolarite.classes.lister', compact('classes'));

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

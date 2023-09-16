<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Salle;
use Illuminate\Http\Request;

class SalleController extends Controller
{
    public function ajouter(){

        return view('admin.salles.ajouter');
    }

    public function lister(){
       
        $salles = Salle::where('status', '1')->get();
        return view('admin.salles.lister', compact('salles'));
    }

    public function inserer(Request $request){
        $sale = new Salle();
       
        $sale->nomSalle = $request->salle;
        $sale->capacite = $request->capacite;
        $sale->save();
        return redirect('admin/salle/lister');
    }

    public function modifier($id){

        $salle = Salle::find($id)->first();

        return view('admin.salles.modifier', compact('salle'));
    }

    public function edit($id, Request $request){

        $sale = Salle::find($id)->first();

        $sale->nomSalle = $request->salle;
        $sale->capacite = $request->capacite;

        $sale->save();

        return redirect('admin/salle/lister');
    }

    public function delete($id){
        $sale = Salle::find($id)->first();

        $sale->status = 0;

        $sale->save();

        return redirect('admin/salle/liste');
    }
}

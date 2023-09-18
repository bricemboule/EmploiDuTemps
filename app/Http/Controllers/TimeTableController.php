<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeTableController extends Controller
{
    public function ajouter(){

        return view('scolarite.emploidetemps.lister');
    }
}

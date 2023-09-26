<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use App\Mail\EmploiDuTempsMail;
use App\Models\Classe;
use App\Models\Lesson;
use App\Services\CalendarService;
use Illuminate\Support\Facades\Mail;
use PDF;


class CalendarController extends Controller
{
    public function index(CalendarService $calendarService, $id)
    {
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        $calendarData = $calendarService->generateCalendarData($weekDays, $id);

        return view('scolarite.emploidetemps.calendar', compact('weekDays', 'calendarData'));
    }

    public function calendrier(CalendarService $calendarService, $classe)
    {
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        $cl = Classe::where('intitule', $classe)->fist();

        dd($cl->id);

        $calendarData = $calendarService->generateCalendarData($weekDays, $cl->id);

        return view('scolarite.emploidetemps.calendar', compact('weekDays', 'calendarData'));
    }

    public function etudiant(CalendarService $calendarService,$id){

        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        dd("Bonsoir chers eleves");
        $pdf = PDF::loadview('scolarite.emploidetemps.etudiant');
        $data = [

            'subject' => ' Emploi du temps de la semaine prochaine',
            'body' => 'Bonsoir chers enseignant, ci-joint, votre programmation de la semaine prochaine.',
            'pdf' => $pdf->output()
        ];

        Mail::to('bricemboule9@gmail.com')->send(new EmploiDuTempsMail($data));

    }

    public function enseignant(CalendarService $calendarService,$id){
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        dd("Bonsoir chers enseignants");

    }

    public function visualiser(CalendarService $calendarService,$id){
        
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($weekDays, $id);

        return view('scolarite.emploidetemps.emploiParClasse', compact('weekDays', 'calendarData'));
    }

    public function visualiserEnseignant(CalendarService $calendarService,$id){
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];

        $calendarData = $calendarService->generateCalendarData($weekDays, $id);

        //dd($calendarData);

        return view('scolarite.emploidetemps.emploiParCours', compact('weekDays', 'calendarData'));
    }
  
}
<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use App\Mail\EmploiDuTempsMail;
use App\Models\Classe;
use App\Models\Lesson;
use App\Models\Semaine;
use App\Services\CalendarService;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;



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

    public function calendrier(CalendarService $calendarService)
    {
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
        ];

        $cl = Classe::where('code', 'L1')->first();
        $semaine = Semaine::where('status', '1')->first();

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($weekDays, $cl->id);

        return view('scolarite.emploidetemps.calendar', compact('weekDays', 'calendarData','cl','semaine'));
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


        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($weekDays, $id);
        $classe = Classe::where('id', $id)->first();
        $semaine = Semaine::where('status', '1')->first();

        $data = ['weekDays'=>$weekDays, 'calendarData'=>$calendarData,'classe'=>$classe,'semaine'=>$semaine];
        
        $pdf =  Pdf::loadView('scolarite.emploidetemps.pdf',$data);

       
        $data = [

            'subject' => ' Emploi du temps de la semaine prochaine',
            'body' => 'Bonsoir chers enseignant, ci-joint, votre programmation de la semaine prochaine.',
            'path' => 'public/cathy.pdf'
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
        ];

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($weekDays, $id);
        $classe = Classe::where('id', $id)->first();
        $semaine = Semaine::where('status', '1')->first();

        $data = ['weekDays'=>$weekDays, 'calendarData'=>$calendarData,'classe'=>$classe,'semaine'=>$semaine];
        
        $pdf =  Pdf::loadView('scolarite.emploidetemps.pdf',$data);

        //return $pdf->download($classe->intitule.'.pdf');

        return view('scolarite.emploidetemps.emploiParClasse', compact('weekDays', 'calendarData', 'classe','semaine'));
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
        $semaine = Semaine::where('status', '1')->first();
        $calendarData = $calendarService->generateCalendarData($weekDays, $id);

        //dd($calendarData);

        return view('scolarite.emploidetemps.emploiParCours', compact('weekDays', 'calendarData','semaine'));
    }
  
}
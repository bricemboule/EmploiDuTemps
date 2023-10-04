<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use App\Mail\EmploiDuTempsMail;
use App\Models\Classe;
use App\Models\Cour;
use App\Models\User;
use App\Models\Lesson;
use App\Models\Role;
use App\Models\Semaine;
use App\Models\Suivre;
use App\Services\CalendarService;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        ];

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($weekDays, $id);
        $classe = Classe::where('id', $id)->first();
        $semaine = Semaine::where('status', '1')->first();

        $pdf =  Pdf::loadView('scolarite.emploidetemps.pdf',compact('calendarData','semaine', 'classe','weekDays'));
        $data = [

            'subject' => ' Emploi de temps de la semaine prochaine',
            'body' => 'Bonjour chers etudiants, ci-joint, votre programmation de cours de la semaine prochaine.',
            'pdf' => $pdf
        ];

        $role = Role::where('intitule', 'etudiant')->first();
        $etudiant = User::where('role_id', $role->id)->where('status', '1')->get();

        foreach($etudiant as $e){

            Mail::to($e->email)->send(new EmploiDuTempsMail($data));
        }
        
        return redirect('scolarite/emploiDuTemps/envoyer/etudiant/');

    }

    public function enseignant(CalendarService $calendarService,$id){
        $weekDays     = [

            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
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
  
        $pdf = Pdf::loadView('scolarite.emploidetemps.pdf',$data);
        //return $pdf->stream($classe->intitule.'.pdf');

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
        ];
        $semaine = Semaine::where('status', '1')->first();
        $calendarData = $calendarService->generateCalendarData($weekDays, $id);

        //dd($calendarData);

        return view('scolarite.emploidetemps.emploiParCours', compact('weekDays', 'calendarData','semaine'));
    }

    public function pdf(CalendarService $calendarService, $id){

        $weekDays     = [
            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
        ];

        $courSuivre = Suivre::where('classe_id', $id)->get(['cour_id']);
        
        $cour = Cour::whereIn('id',$courSuivre)->where('libelle', 'ANALYSE I')->where('status','1')->first();
        //dd($cour);
       
        $semaine = Semaine::where('status', '1')->first();
       //dd($cours);
       

            $calendarData = $calendarService->emploiDeTempsCours($weekDays, $id, $cour);

           

            $data = ['weekDays'=>$weekDays, 'calendarData'=>$calendarData,'cour'=>$cour,'semaine'=>$semaine];
  
            $pdf = Pdf::loadView('scolarite.emploidetemps.pdfenseignant',$data);
            return $pdf->download($cour->libelle.'.pdf');
        

        //dd($calendarData);

        return view('scolarite.emploidetemps.emploiParCours', compact('weekDays', 'calendarData','semaine'));
    }
  
}
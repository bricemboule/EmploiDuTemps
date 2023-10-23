<?php

namespace App\Http\Controllers\scolarite;

use App\Http\Controllers\Controller;
use App\Jobs\EmploiDuTempJob;
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
    public $weekDays= [

        '1' => 'Lundi',
        '2' => 'Mardi',
        '3' => 'Mercredi',
        '4' => 'Jeudi',
        '5' => 'Vendredi',
        '6' => 'Samedi',
    ];

    public function index(CalendarService $calendarService, $id)
    {
       

        $calendarData = $calendarService->generateCalendarData($this->weekDays, $id);

        return view('scolarite.emploidetemps.calendar', compact('weekDays', 'calendarData'));
    }

    public function calendrier(CalendarService $calendarService)
    {
     
        $cl = Classe::where('code', 'L1')->first();
        $semaine = Semaine::where('status', '1')->first();

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($this->weekDays, $cl->id);
        $weekDays = $this->weekDays;

        return view('scolarite.emploidetemps.calendar', compact('weekDays', 'calendarData','cl','semaine'));
    }

    public function etudiant(CalendarService $calendarService,$id){

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($this->weekDays, $id);
        $classe = Classe::where('id', $id)->first();
        $semaine = Semaine::where('status', '1')->first();
        $weekDays = $this->weekDays;

        //$pdf =  Pdf::loadView('scolarite.emploidetemps.pdf',compact('calendarData','semaine', 'classe','weekDays'));
        $data = [

            'subject' => ' Emploi de temps de la semaine prochaine',
            'body' => 'Bonjour chers etudiants, ci-joint, votre programmation de cours de la semaine prochaine.',
        ];

        $role = Role::where('intitule', 'etudiant')->first();
        $etudiant = User::where('role_id', $role->id)->where('status', '1')->where('classe_id', $classe->id)->get();

        foreach($etudiant as $e){

            EmploiDuTempJob::dispatch($data, $e->email);
            //Mail::to($e->email)->send(new EmploiDuTempsMail($data));
        }
        
        return redirect('scolarite/emploiDuTemps/envoyer/etudiant/');

    }

    public function enseignant(CalendarService $calendarService,$id){
       

        dd("Bonsoir chers enseignants");

    }

    public function visualiser(CalendarService $calendarService,$id){

        $calendarData = $calendarService->genererEmploiDuTempsEtudiant($this->weekDays, $id);
        $classe = Classe::where('id', $id)->first();
        $semaine = Semaine::where('status', '1')->first();

        $data = ['weekDays'=>$this->weekDays, 'calendarData'=>$calendarData,'classe'=>$classe,'semaine'=>$semaine];
  
        $pdf = Pdf::loadView('scolarite.emploidetemps.pdf',$data);
        $weekDays = $this->weekDays;

        return view('scolarite.emploidetemps.emploiParClasse', compact('weekDays', 'calendarData', 'classe','semaine'));
    }

    public function visualiserEnseignant(CalendarService $calendarService,$id){
        $semaine = Semaine::where('status', '1')->first();
        $calendarData = $calendarService->generateCalendarData($this->weekDays, $id);
        $weekDays = $this->weekDays;

        return view('scolarite.emploidetemps.emploiParCours', compact('weekDays', 'calendarData','semaine'));
    }

    public function pdf(CalendarService $calendarService, $id){

        $classe = Classe::where('id', $id)->first();
        $courSuivre = Suivre::where('classe_id', $id)->get(['cour_id']);
        $cours = Cour::with('user')->whereIn('id',$courSuivre)->where('status','1')->get();
        $semaine = Semaine::where('status', '1')->first();

        $folder = 'Emploi du tepms/'.$classe->intitule.'/'.$semaine->libelle;

       if (Storage::directoryMissing($folder)) {
            Storage::makeDirectory($folder);
       }

         foreach ($cours as $cour){
            $user = Cour::where('libelle', $cour->libelle)->first();
            $teacher = User::where('id', $user->user_id)->first();
            $calendarData = $calendarService->emploiDeTempsCours($this->weekDays, $id, $cour);
            $d = ['jours'=>$this->weekDays, 'calendarData'=>$calendarData,'cour'=>$cour,'semaine'=>$semaine];
            /*$pdf = Pdf::loadView('scolarite.emploidetemps.pdfenseignant',$d)
                    ->save(Storage::path($folder) . DIRECTORY_SEPARATOR . $cour->libelle.'.pdf');*/
            
                    $pdf = Pdf::loadView('scolarite.emploidetemps.pdfenseignant',$d);
            $data = [
                'subject' => ' Emploi de temps '.$semaine->libelle,
                'body' => 'Bonjour '.$teacher->grade. ' '.$teacher->nom. ', ci-joint, votre programmation de la semaine prochaine.',
                //'pdf' => storage_path('app/Emploi du tepms/Licence 1/Semaine du 09 au 14 Octobre 2023/ALGEBRE LINEAIRE I.pdf'),
                'info' => $d,
                'cours' => $cour->libelle,
                'dossier'=> $folder,
                'pdf'=> $pdf
            ];
           
            //echo 'bonjour';
            //Mail::to('bricemboule9@gmail.com')->send(new EmploiDuTempsMail($data));
            EmploiDuTempJob::dispatch($data, $teacher->email);

          }

          return redirect('scolarite/emploiDuTemps/envoyer/enseignant/');

    }
  
}
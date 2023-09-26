<?php

namespace App\Services;

use App\Models\Lesson;
use App\Models\Semaine;
use App\Models\Suivre;
use App\Models\Cour;
use App\Services\TimeService;

class CalendarService
{
    public function generateCalendarData($weekDays,$id)
    {
     
        $emploiDuTemps = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $semaine = Semaine::where('status', '1')->first();
        $courSuivre = Suivre::where('classe_id', $id)->get(['cour_id']);
        
        $cours = Cour::whereIn('id',$courSuivre)->where('status','1')->get();

        $lessons   = Lesson::with('classe', 'user')
                            ->where('classe_id', $id)
                            ->where('semaine_id', $semaine->id)
                            ->get();

       

       foreach ($cours as $cour){
            
            $calendarData = [];
            foreach ($timeRange as $time)
            {
                $timeText = $time['debut'] . ' - ' . $time['fin'];
                $calendarData[$timeText] = [];

                foreach ($weekDays as $index => $day)
                {
                    $lesson = Lesson::with('classe', 'user')
                                        ->where('classe_id', $id)
                                        ->where('semaine_id', $semaine->id)
                                        ->where('cour_id', $cour->id)
                                        ->where('jour', $day)->where('debut', $time['debut'])->first();

                    if ($lesson)
                    {
                        array_push($calendarData[$timeText], [
                            'classe'   => $lesson->classe->intitule,
                            'enseignant' => $lesson->user->nom,
                            'cours'=> $lesson->cour->libelle,
                            'rowspan'      => $lesson->difference / 60 ?? ''
                        ]);
                    }
                    else if (!$lessons->where('jour', $day)->where('debut', '<', $time['debut'])->where('fin', '>=', $time['fin'])->count())
                    {
                        array_push($calendarData[$timeText], 1);
                    }
                    else
                    {
                        array_push($calendarData[$timeText], 0);
                    }
                }
            }

            array_push($emploiDuTemps, $calendarData);
       }

        return $emploiDuTemps;
    }

    public function genererEmploiDuTempsEtudiant($weekDays,$id)

    {
     
        $calendarData = [];
        $timeRange = (new TimeService)->generateTimeRange(config('app.calendar.start_time'), config('app.calendar.end_time'));
        $semaine = Semaine::where('status', '1')->first();
    
        $lessons   = Lesson::with('classe', 'user')
                            ->where('classe_id', $id)
                            ->where('semaine_id', $semaine->id)
                            ->get();

     
            foreach ($timeRange as $time)
            {
                $timeText = $time['debut'] . ' - ' . $time['fin'];
                $calendarData[$timeText] = [];

                foreach ($weekDays as $index => $day)
                {
                    $lesson = Lesson::with('classe', 'user')
                                        ->where('classe_id', $id)
                                        ->where('semaine_id', $semaine->id)
                                        ->where('jour', $day)->where('debut', $time['debut'])->first();

                    if ($lesson)
                    {
                        array_push($calendarData[$timeText], [
                            'classe'   => $lesson->classe->intitule,
                            'enseignant' => $lesson->user->nom,
                            'cours'=> $lesson->cour->libelle,
                            'rowspan'      => $lesson->difference / 60 ?? ''
                        ]);
                    }
                    else if (!$lessons->where('jour', $day)->where('debut', '<', $time['debut'])->where('fin', '>=', $time['fin'])->count())
                    {
                        array_push($calendarData[$timeText], 1);
                    }
                    else
                    {
                        array_push($calendarData[$timeText], 0);
                    }
                }
            }

        return $calendarData;
    }
}

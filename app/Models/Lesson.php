<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable=[

        'jour',
        'debut',
        'fin',
        'cour_id',
        'classe_id',
        'salle_id',
        'enseignant_id',
        'semaine_id'
    ];

    public function getDifferenceAttribute()
    {
        return Carbon::parse($this->fin)->diffInMinutes($this->debut);

    }

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function classe(){

        return $this->belongsTo(Classe::class);
    }

    public function salle(){

        return $this->belongsTo(Salle::class);
    }

    public function semaine(){

        return $this->belongsTo(Semaine::class);
    }

    public function cour(){

        return $this->belongsTo(Cour::class);
    }

    public function scopeCalendarByRoleOrClassId($query)
    {
        return $query->when(!request()->input('class_id'), function ($query) {
            $query->when(auth()->user()->is_teacher, function ($query) {
                $query->where('teacher_id', auth()->user()->id);
            })
                ->when(auth()->user()->is_student, function ($query) {
                    $query->where('class_id', auth()->user()->class_id ?? '0');
                });
        })
            ->when(request()->input('class_id'), function ($query) {
                $query->where('class_id', request()->input('class_id'));
            });
    }

  
}

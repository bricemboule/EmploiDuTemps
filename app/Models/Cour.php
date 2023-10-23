<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'semestre',
        'volumeHoraire',
        'effectue',
        'restant',
        'user_id'
    ];

    public function user(){

        return $this->belongsTo(User::class);
    }

    public function seances(){

        return $this->hasMany(Seance::class);
    }

    public function lessons(){

        return $this->hasMany(Lesson::class);
    }

    public function sanction(){

        return $this->hasMany(Sanction::class);
    }

    public function classes(){
        return $this->belongsToMany(Classe::class, 'suivres', 'cour_id', 'classe_id');
    }

    
    public function semaines(){

        return $this->belongsToMany(Semaine::class, 'est_programmers', 'cour_id','semaine_id');
    }
}

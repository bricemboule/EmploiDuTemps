<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'intitule',
        'cycle',
        'specialite'
    ];

    public function etudiants(){
        return $this->belongsToMany(Etudiant::class, 'inscrire', 'classe_id', 'etudiant_id');
    }

    public function niveau(){
        return $this->belongsTo(Niveau::class);
    }

    public function specialite(){
        return $this->belongsTo(Specialite::class);
    }

    public function cours(){
        return $this->belongsToMany(Cour::class, 'suivres', 'classe_id', 'cour_id');
    }

    public function lessons(){

        return $this->hasMany(Lesson::class);
    }

    public function salles(){

        return $this->belongsToMany(Salle::class, 'est_programmers', 'classe_id','salle_id');
    }

    public function enseignants(){

        return $this->belongsToMany(User::class, 'est_programmers', 'classe_id','user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

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
        return $this->belongsToMany(Cour::class, 'suivre', 'classe_id', 'cour_id');
    }
}

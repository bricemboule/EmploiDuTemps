<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnneeAcademique extends Model
{
    use HasFactory;

    public function etudiants(){

        return $this->belongsToMany(Etudiant::class, 'inscrire', 'annee_academique_id', 'etudiant_id');
    }
}

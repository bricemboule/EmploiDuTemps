<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    public function classe(){

        return $this->belongsToMany(Classe::class, 'inscrire', 'etudiant_id', 'classe_id');
    }

    public function annees(){

        return $this->belongsToMany(AnneeAcademique::class, 'inscrire', 'etudiant_id', 'annee_academique_id');
    }

    public function sactions(){
        return $this->hasMany(Sanction::class);
    }

}

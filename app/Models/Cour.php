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
        'code',
        'semestre',
        'volumeHoraire',
        'effectue',
        'restant'
    ];

    public function enseignants(){

        return $this->belongsToMany(Enseignant::class, 'enseignes', 'cour_id', 'enseignant_id');
    }

    public function seances(){

        return $this->hasMany(Seance::class);
    }

    public function sanction(){

        return $this->hasMany(Sanction::class);
    }

    public function classes(){
        return $this->belongsToMany(Classe::class, 'suivre', 'cour_id', 'classe_id');
    }
}

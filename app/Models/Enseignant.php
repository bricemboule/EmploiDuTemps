<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone1',
        'telephone2',
        'email',
        'grade',
        'login',
        'password',
        'photo'
    ];

    public function cours(){

        return $this->belongsToMany(Cour::class, 'enseignes', 'enseignant_id', 'cour_id');
    }

    public function programme(){
        return $this->belongsToMany(Cour::class, 'est_programmer', 'enseignant_id', 'cour_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomSalle',
        'capacite',
        'status'
    ];

    public function classes(){

        return $this->belongsToMany(Classe::class, 'est_programmers','salle_id','classe_id');
    }

    public function lessons(){

        return $this->hasMany(Lesson::class);
    }
}

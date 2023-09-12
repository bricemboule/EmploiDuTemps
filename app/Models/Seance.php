<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenu',
        'dateSeance',
        'heureDebut',
        'heureFin',
        'duree',
        'status',
        'cour_id'
    ];

    public function cour(){

        return $this->belongsTo(Cour::class);
    }
}

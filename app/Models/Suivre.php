<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivre extends Model
{
    use HasFactory;

    protected $fillable =[
        'cour_id',
        'classe_id'
    ];
}

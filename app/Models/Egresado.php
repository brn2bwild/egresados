<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Egresado extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'carrera', 'matricula', 'clave'];
}

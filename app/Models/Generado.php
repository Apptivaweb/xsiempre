<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Generado extends Model
{
    use HasFactory;    
	protected $fillable =[
        'slug',
        'nombre',
        'gif',
        'visitas',
        'descargas',
        'publicado',
        'generado',
        'plantilla_id',
        'nombre1_id',
        'nombre2_id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;
    protected $fillable = [       
        'nombre',
        'frase',
	    'top',
		'bottom',
		'gif',
        'gif_descargas',
        'gif_nombretop',
		'gif_nombreleft',
		'gif_nombrestrokecolor',
		'gif_nombrestrokewidth',
		'gif_nombrefontsize',
		'gif_nombrefontcolor',
        'gif_frasetop',
		'gif_fraseleft',
		'gif_frasestrokecolor',
		'gif_frasestrokewidth',
		'gif_frasefontsize',
		'gif_frasefontcolor',

        'png',
        'png_descargas',
        'png_fototop',
		'png_fotoleft',
        'png_nombretop',
		'png_nombreleft',
		'png_nombrestrokecolor',				
		'png_nombrestrokewidth',
		'png_nombrefontsize',
		'png_nombrefontcolora',
        'png_nombrefontcolorb',
        'png_frasetop',
		'png_fraseleft',
		'png_frasestrokecolor',				
		'png_frasestrokewidth',
		'png_frasefontsize',
		'png_frasefontcolor',
        'png_frasewidth',
        'png_fraseheight',
        
        'marco',
        'marco_fototop',
		'marco_fotoleft',
        'marco_nombretop',
		'marco_nombreleft',
		'marco_nombrestrokecolor',				
		'marco_nombrestrokewidth',
		'marco_nombrefontsize',
		'marco_nombrefontcolor',        
        'marco_frasetop',
		'marco_fraseleft',
		'marco_frasestrokecolor',				
		'marco_frasestrokewidth',
		'marco_frasefontsize',
		'marco_frasefontcolor',
        
        'visitas',
        'publicado',
 		'font1_id',
        'font2_id'
				
    ];

}

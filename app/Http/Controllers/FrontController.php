<?php

namespace App\Http\Controllers;

use Imagick;
use ImagickDraw;
use App\Models\Nombre;
use App\Models\Generado;
use App\Models\Plantilla;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $m = Nombre::whereSexo(1)->orderByDesc("numero")->take(10)->get();
        $f = Nombre::whereSexo(0)->orderByDesc("numero")->take(10)->get();
        $generados = Generado::orderByDesc("visitas")->take(20)->get();
        return view('welcome', compact("m","f","generados"));
    }

    public function pareja(Request $request){
        $plantillas = Plantilla::all();       
        $path = explode("-",$request->path());
        $m = Nombre::whereSlug($path[0])->first();
        $f = Nombre::whereSlug($path[2])->first();
        if(((empty($m)) && (empty($f)))){
            return redirect('/');
        }
        return view('front.pareja', compact("plantillas","m","f"));
    }
    
    public function plantilla($pareja, Plantilla $plantilla){        
        $path = explode("-",$pareja);
        $m = Nombre::whereSlug($path[0])->first();
        $f = Nombre::whereSlug($path[2])->first();
        if(((empty($m)) && (empty($f)))){
            return redirect('/');
        }
        $_slug  =   $plantilla->slug."-".$m->slug."-y-".$f->slug;
        $generado = Generado::whereSlug($_slug)->first();
        if(empty($generado)){
            

            $img = new Imagick(public_path('/gif/'.$plantilla->gif));
            foreach($img as $fotograma){
                $draw = new ImagickDraw();
                //NOMBRE A Y B
                $draw->setFont(public_path('font/'.$plantilla->font1->urlfont));
                $draw->setFontSize($plantilla->gif_nombrefontsize);
                $draw->setStrokeColor($plantilla->gif_nombrestrokecolor);
                $draw->setStrokeWidth($plantilla->gif_nombrestrokewidth);
                $draw->setTextAlignment(\Imagick::ALIGN_CENTER);
                $draw->setFillColor($plantilla->gif_nombrefontcolor);
                $fotograma->annotateImage($draw,$plantilla->gif_nombreleft,$plantilla->gif_nombretop,0,$m->nombre." y ".$f->nombre);
                //FRASE
                /*$draw->setFont(public_path('font/'.$plantilla->font1->urlfont));
                $draw->setFontSize($plantilla->gif_nombrefontsize);
                $draw->setStrokeColor($plantilla->gif_nombrestrokecolor);
                $draw->setStrokeWidth($plantilla->gif_nombrestrokewidth);
                $draw->setTextAlignment(\Imagick::ALIGN_CENTER);
                $draw->setFillColor($plantilla->gif_nombrefontcolor);
                $fotograma->annotateImage($draw,$plantilla->gif_nombretop,$plantilla->gif_nombreleft,0,$f->nombre);
                */
            }
            $nuevonombre    =   $_slug.".gif";
            $img->writeImages(public_path("gif/g/".$nuevonombre),true);
            $img->clear();
            $img->destroy();
            $img->destroy();

            $generado = new Generado();
            $generado->slug        =   $_slug;
            //$generado->title       =   "$plantilla->slug de $m->nombre para $f->nombre | GIF DE AMOR";
            //$generado->description =   "Imágenes y Gifs Animados de amor personalizados para $h->nombre de $m->nombre con frases de amor para él y enviarle por whatsapp, facebook o descargar gratis";
            $generado->nombre      =   "$plantilla->nombre de $m->nombre para $f->nombre";        
            $generado->gif         =   $nuevonombre;
            $generado->generado    =   1;
            $generado->plantilla_id=   $plantilla->id;
            $generado->nombre1_id  =   $m->id;
            $generado->nombre2_id  =   $f->id;
            $generado->save();
        }
        return view('front.generado', compact("generado") );
        
    }

    public function ajaxbusca(Request $request){                
        if($request->ajax()):
            $explotar = explode(" ",$request->texto);
            switch(count($explotar)){
                case 1: 
                    $nombre=Nombre::orderBy("nombre")->where("nombre","like", $request->texto."%")->limit(1)->first();
                    if($nombre->sexo)
                        $todos = Nombre::whereSexo(0)->orderByDesc("numero")->take(10)->get();
                    else
                        $todos = Nombre::whereSexo(1)->orderByDesc("numero")->take(10)->get();
                    $parejas    = [];
                    foreach($todos as $t){
                        $parejas[] = $nombre->nombre ." y ". $t->nombre;
                    }
                    break;                    
                case 2:                     
                    break;

                case 3: 
                    $nombre=Nombre::orderBy("nombre")->where("nombre","like", $explotar[0]."%")->limit(1)->first();
                    if($nombre->sexo)
                        $todos = Nombre::where("nombre","like", $explotar[2]."%")->whereSexo(0)->orderByDesc("numero")->take(10)->get();
                    else
                        $todos = Nombre::where("nombre","like", $explotar[2]."%")->whereSexo(1)->orderByDesc("numero")->take(10)->get();
                    $parejas    = [];
                    foreach($todos as $t){
                        $parejas[] = $nombre->nombre ." y ". $t->nombre;
                    }
                    break;
            }
            

            

            if(!empty($parejas)):
                return response()
                ->json([
                    'parejas'   => $parejas,
                    'success'   => true,
                ]);
            else:
                return response()
                ->json([                    
                    'success' => false
                ]);
            endif;
        else:
            return response()
            ->json([                    
                    'success' => false
                ]);
        endif;
    }
}

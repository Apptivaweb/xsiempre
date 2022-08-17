<?php

namespace App\Http\Controllers\Admin;

use Session;
use App\Models\Font;
use App\Models\Nombre;
use App\Models\Plantilla;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlantillaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $plantillas =   Plantilla::paginate(100);
        return view('admin.plantilla.index',compact('plantillas'));        
    }
    public function create(){        
        return view('admin.plantilla.create');    
    }

    public function store(Request $request){
        $plantilla        =   new Plantilla($request->all());    
        if(!empty($request->file('gif'))){
            $imagen =   $request->file('gif');
            $nombre =   'gif-'.Str::slug($request->nombre).'.'.$imagen->guessExtension();
            $ruta   =   public_path('/gif/'.$nombre);
            copy($imagen->getRealPath(),$ruta);
            $plantilla->gif     =   $nombre;            
        }
        $plantilla->slug        =   Str::slug($request->nombre);
        $plantilla->font1_id    =   1;
        $plantilla->font2_id    =   1;
        $plantilla->save();            

        /*
        /// generar combinaciones de nombres 
        $hombres = Nombre::whereSexo(0)->get();
        $mujeres = Nombre::whereSexo(1)->get();
        $x=0;
        foreach($hombres as $h){
            foreach($mujeres as $m){
                echo $h->nombre . " y ". $m->nombre;
                //if($h->sexo!= $m->sexo){}
            }
        }
        $plantilla->save();
        */
        return redirect()->route('plantilla.index');
    }
    public function edit($id){
        $plantilla  =   Plantilla::find($id);
        $fonts      =   Font::pluck("nombre","id");
        $fuentes    =   Font::all();
        return view('admin.plantilla.edit', compact('plantilla','fonts','fuentes'));
    }
    public function update(Request $request, $id){  
        $plantilla      =   Plantilla::find($id);
        $gif_anterior   =   $plantilla->gif; 
        $png_anterior   =   $plantilla->png; 
        $marco_anterior =   $plantilla->marco; 
        $plantilla->fill($request->all());
        $plantilla->save();
        return redirect('admin/plantilla');
    }


    public function limite(Request $request){
        Session::put("limite",$request->limite);
        return redirect()->back();
    }

    public function show($id){
        $masculino  = Nombre::whereSexo(1)->get();
        $femenino   = Nombre::whereSexo(0)->get();
        $contado = 0;
        foreach($femenino as $m){            
            echo $contado++.".-".$m->nombre ."<br>";            /*
            foreach($femenino as $f){
                echo $contado++.".-".$m->nombre ." - ".$f->nombre."<br>";
            }*/
        }
    }
}

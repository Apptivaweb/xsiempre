<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plantilla;
use Illuminate\Support\Str;

class PlantillaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $plantillas =   Plantilla::paginate(200);
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
            $ruta   =   public_path('/img/gif/'.$nombre);
            copy($imagen->getRealPath(),$ruta);
            $plantilla->gif     =   $nombre;
            $plantilla->save();
        }   
        $plantilla              =   new Navidad($request->all());            
        $plantilla->font1_id    =   1;
        $plantilla->font2_id    =   1;
            

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
        return redirect()->route('plantilla.index');
    }
}

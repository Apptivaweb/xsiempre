<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nombre;
use Illuminate\Support\Str;


class NombreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $nombres =   Nombre::orderByDesc("updated_at")->paginate(200);
        return view('admin.nombre.index',compact('nombres'));        
    }
    public function create(){
        return view('admin.nombre.create');
    }

    public function store(Request $request){
        $nombre        =   new Nombre($request->all());
        $nombre->slug  =   Str::slug($request->nombre);
        $nombre->save();
        return redirect()->route('admin.nombre.index');
       
    }
    public function update(Request $request,$id){
        $nombre  =   Nombre::findOrFail($id);
        $nombre->fill($request->all());
        $nombre->slug      = Str::slug($request->nombre);
        $nombre->sexo      = ($request->sexo) ? 1 : 0;
        $nombre->publicado = ($request->publicado) ? 1 : 0;
        $nombre->save();
        return redirect()->route('admin.nombre.index');
    }

    public function edit($id){
        $nombre  =   Nombre::findOrFail($id);
        return view('admin.nombre.edit',compact('nombre'));
    }
    
    public function destroy($id){
        $nombre        =   Nombre::findOrFail($id);
        /*
        $gifgenerados  =   Gifgenerado::whereNombre_id($nombre->id)->get();
        if(count($gifgenerados)){
            foreach($gifgenerados as $gifgenerado){
                $rutaAnterior   =   public_path("/img/gif/g/".$gifgenerado->urlfoto);
                if ((file_exists($rutaAnterior)) && ($gifgenerado->urlfoto!=null)){   
                    unlink (realpath($rutaAnterior));   
                    echo "Imagen eliminada <br>";
                }
                $gifgenerado->delete();
            }            
        }*/
        $nombre->delete();
        return redirect()->route('admin.nombre.index');
    }  
}

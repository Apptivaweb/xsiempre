<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Font;
class FontController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request)
    {   
        $fonts = Font::orderBy("nombre","desc")->get();
        return view("admin.font.index", compact('fonts'));   
    }

    public function create(){        
        return view('admin.font.create');    
    }

    public function store(Request $request){
        try{

            $font            =   new Font($request->all());
            if ($request->hasFile('urlfont')):
                $urlfont = $request->file('urlfont');
               
                $nombreurlfont = Str::slug($request->nombre).'.'.$urlfont->getClientOriginalExtension();
                $ruta=public_path('/font/'.$nombreurlfont);
                // UPLOAD DE UN FILE
                if($urlfont->getClientOriginalExtension()=='ttf') {
                    copy($urlfont->getRealPath(),$ruta);
                }
                $font->urlfont  =   $nombreurlfont;
            endif;            
            $font->save();
            return redirect()->route('font.index');            
        }
        catch(Exception $e){
            return "Fatal error".$e->getMessage();
        }
    }

   

   
    public function edit($id)
    {
        $font= Font::whereId($id)->first();                
        return view('font.edit', compact("font"));
    }

    public function update(Request $request, $id){       
        $font     =   Font::findOrFail($id);
        if ($request->hasFile('urlfont')):           
            $urlfont    =   $request->file('urlfont');
            $nombreurlfont = Str::slug($request->nombre).'.'.$urlfont->getClientOriginalExtension();
            $ruta=public_path('/font/'.$nombreurlfont);
            // UPLOAD FILE
            if($urlfont->getClientOriginalExtension()=='ttf')
                copy($urlfont->getRealPath(),$ruta);            
            $font->urlfont  =   $nombreurlfont;
        endif;
        $font->nombre   =   $request->nombre;
        $font->save();
        return redirect()->route('font.index');
    }
    
    public function destroy($id){
            $font       =   Font::findOrFail($id);
            $ruta       =   public_path("/font/".$font->urlfont);
            if (file_exists($ruta))
                unlink (realpath($ruta));
            $font->delete();
            return redirect()->route('font.index');     
    }
}

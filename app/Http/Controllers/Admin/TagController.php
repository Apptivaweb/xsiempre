<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $tags =   Tag::paginate(200);
        return view('admin.tag.index',compact('tags'));        
    }
    public function create(){
        return view('admin.tag.create');
    }

    public function store(Request $request){
        $tag        =   new Tag($request->all());
        $tag->slug  =   Str::slug($request->tag);
        $tag->save();
        return redirect()->route('tag.index');
       
    }
    public function update(Request $request,$id){
        $tag  =   Tag::findOrFail($id);
        $tag->fill($request->all());
        $tag->slug      = Str::slug($request->tag);      
        $tag->save();
        return redirect()->route('tag.index');
    }

    public function edit($id){
        $tag  =   Tag::findOrFail($id);
        return view('admin.tag.edit',compact('tag'));
    }
    
    public function destroy($id){
        $tag        =   Tag::findOrFail($id);       
        $tag->delete();
        return redirect()->route('tag.index');
    }  
}

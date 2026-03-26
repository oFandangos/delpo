<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $materials = Material::all();
        return view('index', ['materials' => $materials]);
    }

    public function search(Request $request){
        $materials = Material::select('titulo','titulo_publicacao','autores','editoras')
        ->where('titulo', 'like', "%$request->pesquisa%")
        ->orWhere('autores','like', "%$request->pesquisa%")
        ->get();
        
        return view('index',['materials' => $materials]);
    }

}

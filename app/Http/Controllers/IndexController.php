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
        $material = Material::select('titulo','titulo_publicacao','autores','editoras');
        $material->where('titulo', 'like', "$request->pesquisa%");
        dd($material->get(), $request->pesquisa);
    }

}

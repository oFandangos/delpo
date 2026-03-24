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
}

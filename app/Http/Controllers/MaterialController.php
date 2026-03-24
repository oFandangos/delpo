<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class MaterialController extends Controller
{
    public function show(Material $material){
        return view('show', ['material' => $material]);
    }

    public function downloadText(Material $material){
        $material = collect($material)->slice(1,-2); //pula id e created_at
        
        $material = $material
        ->map(fn($value, $key) => "$key: $value")
        ->implode("\n");
        
        return response($material)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="arquivo.txt"');
    }
}

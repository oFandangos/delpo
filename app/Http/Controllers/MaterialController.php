<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Models\Material;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Gate;

class MaterialController extends Controller
{
    public function show(Material $material){
        return view('show', ['material' => $material]);
    }

    public function create(){
        Gate::authorize('admin');
        return view('create', ['material' => new Material]);
    }

    public function store(MaterialRequest $request){
        Gate::authorize('admin');
        $validated = $request->validated();
        $material = Material::create($validated);
        session()->flash('alert-success','Material cadastrado com sucesso');
        return redirect("/show/{$material->id}");
    }

    public function edit(Material $material){
        Gate::authorize('admin');
        return view('edit',['material' => $material]);
    }

    public function update(Material $material, MaterialRequest $request){
        Gate::authorize('admin');
        $validated = $request->validated();
        $material->update($validated);
        session()->flash('alert-success','Alterado com sucesso');
        return redirect("/show/{$material->id}");
    }

    public function delete(Material $material){
        Gate::authorize('admin');
        $material->delete();
        return redirect('/');
    }

    public function downloadText(Material $material){
        $material = collect($material)->slice(1,-2); //pula id e created_at
        
        $material = $material       //coloca o nome do campo no arquivo
        ->map(fn($value, $key) => "$key: $value")
        ->implode("\n");
        
        return response($material)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="arquivo.txt"');
    }
}

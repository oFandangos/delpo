<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function create(){
        $diretorio = storage_path('delpo.txt');
        $linhas = file($diretorio);

        //$data = array_map('str_getcsv',$linhas);
        
        $campos = array_slice($linhas, 0, -4); 
        foreach($campos as $campo){
            $campo = explode(": ",$campo);
            $trim[$campo[0]] = trim($campo[1]);
        }
        foreach($trim as $t){ //fazer o crud;
            $material = new Material;
            $material->titulo = $trim['Título'];
            $material->titulo_publicacao = $trim["Título pub."];
            $material->autores = $trim["Autores"];
            $material->editoras = $trim["Editoras"];
            $material->genero = $trim["Gênero"];
            $material->suporte = $trim["Suporte"];
            $material->data_publicacao = $trim["Data publicação"];
            $material->comentarios = $trim["Comentários" ];
            $material->localizacao = $trim['Localização'];
            $material->descricao = array_pop($linhas);
        }
        $material->save();
        dd(array_merge($trim, ['descricao' => array_pop($linhas)]));
        dd($trim);
        
    }
}

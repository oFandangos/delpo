<?php

namespace App\Console\Commands;

use App\Models\Material;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('app:import-txt')]
#[Description('Command description')]
class ImportTxt extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
    $diretorios = glob(storage_path('*.txt'));

        $linhas = collect($diretorios)->map(function($diretorio){
            return file($diretorio);
        })->toArray();
        
        $campos = collect($linhas)->map(function($linha){
            return collect($linha)->slice(0,-4);
        })->toArray();

        $final = [];
        foreach($campos as $campo){
            $trim = [];
            foreach($campo as $c){
                $partes = explode(": ",$c);
                $trim[$partes[0]] = trim($partes[1]);
            }
            $final[] = $trim;
        }
        
        foreach($linhas as $linha){
            $descricao[] = array_pop($linha);
        }
        foreach($final as $key => $f){
            $material = new Material;
            $material->titulo = $f['Título'];
            $material->titulo_publicacao = $f["Título pub."];
            $material->autores = $f["Autores"];
            $material->editoras = $f["Editoras"];
            $material->genero = $f["Gênero"];
            $material->suporte = $f["Suporte"];
            $material->data_publicacao = $f["Data publicação"];
            $material->comentarios = $f["Comentários" ];
            $material->localizacao = $f['Localização'];
            $material->descricao = $descricao[$key] ?? null;
            $material->save();
        }
    }
}

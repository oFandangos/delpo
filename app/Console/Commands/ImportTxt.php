<?php

namespace App\Console\Commands;

use App\Models\Material;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

#[Signature('app:import-txt {path}')]
#[Description('Command description')]
class ImportTxt extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {    
        $path = realpath($this->argument("path"));
        $diretorios = File::files($path);
        
        $linhas = collect($diretorios)->filter(function($diretorio){
            //somente arquivos txt, caso haja outros arquivos na pasta
            $diretorio = (pathinfo($diretorio, PATHINFO_EXTENSION) === 'txt');
            return ($diretorio);
        })
        ->map(function($diretorio){
            return file($diretorio);
        })->toArray();
        
        $campos = collect($linhas)->map(function($linha){
            return collect($linha)->slice(0,-4);
        })->toArray();

        $final = [];
        foreach($campos as $campo){
            $campos_formatados = [];
            foreach($campo as $c){
                if(str_contains($c, ": ")){

                $partes = explode(": ",$c, 2);
                $valor = $partes[1] ?? '';
                
                if($valor === ''){
                    $valor = 'N/A';
                }
                $campos_formatados[$partes[0]] = trim($valor);
                }else{
                    if($partes[0] !== null){
                        $campos_formatados[$partes[0]] .= '; ' . $c;
                    }
                }
            }
            $final[] = $campos_formatados;
        }
        
        foreach($linhas as $linha){
            $descricao[] = array_pop($linha);
        }
        foreach($final as $key => $f){
            if(!$key){
                print_r($final);
            }
            
            $material = new Material;
            $material->titulo = $f['Título'] ?? "N/A";
            $material->titulo_publicacao = $f["Título publicação"] ?? "N/A";
            $material->autores = $f["Autores"] ?? "N/A";
            $material->editoras = $f["Editoras"] ?? "N/A";
            $material->genero = $f["Gênero"] ?? "N/A";
            $material->suporte = $f["Suporte"] ?? "N/A";
            $material->data_publicacao = $f["Data publicação"] ?? "N/A";
            $material->comentarios = $f["Comentários" ] ?? "N/A";
            $material->localizacao = $f['Localização'] ?? "N/A";
            $material->descricao = $descricao[$key] ?? "N/A";
            $material->save();
        }
    }
}

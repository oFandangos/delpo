<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "titulo" => ["required"],
            "titulo_publicacao" => ["required"],
            "autores" => ["required"],
            "editoras" => ["required"],
            "genero" => ["required"],
            "suporte" => ["required"],
            "data_publicacao" => ["required","date_format:d/m/Y"],
            "localizacao" => ["required"],
            "comentarios" => ["required"],
            "descricao" => ["required"],
        ];
    }

    public function messages(){
        return [
            "titulo.required" => 'O título é obrigatório',
            "titulo_publicacao.required" => 'Título de publicação é obrigatório',
            "autores.required" => 'O campo "Autor(es)" é obrigatório',
            "editoras.required" => 'O campo "Editor(as)" é obrigatório',
            "genero.required" => 'O gênero é obrigatório',
            "suporte.required" => 'O campo "Suporte" é obrigatório',
            "data_publicacao.required" => 'A data da publicação é obrigatória',
            "data_publicacao.date_format" => 'Insira a data no formato d/m/y',
            "localizacao.required" => 'A localização é obrigatória',
            "comentarios.required" => 'O campo "comentários" é obrigatório',
            "descricao.required" => 'A descrição é obrigatória',
        ];
    }

}

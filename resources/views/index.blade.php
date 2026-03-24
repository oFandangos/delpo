@extends('laravel-usp-theme::master')

@section('content')
    DELPo: Dicionário Etimológico da Língua Portuguesa<br/>
    @foreach($materials as $material)
        <a href="/material/{{ $material->id }}" class="btn btn-success">{{ $material->id }}: {{ $material->titulo }}</a><br/>
    @endforeach
@endsection
@extends('laravel-usp-theme::master')

@section('content')
<div class="row" style="padding:10px;">
    <h3 style="font-weight:bold;">
        DELPo: Dicionário Etimológico da Língua Portuguesa<br/>
    </h3>
</div>

<div class="row">
    <div class="col">
        <form method="get" action="/search">
            @csrf
            <input name="pesquisa" value="{{ old('pesquisa',request()->pesquisa) }}" type="text" class="form-control" placeholder="Pesquisar por título ou autor">
            <button type="submit" class="btn btn-success"><i class="fas fa-search"></i></button>
        </form>
    </div>
</div>

    @include('partials.table_index')

    <style>
        #tr:hover{
            background-color:#c2c2c2;
        }
    </style>

@endsection
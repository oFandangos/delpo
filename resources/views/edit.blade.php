@extends('laravel-usp-theme::master')
@section('content')

<div class="card">
    <b class="card-header">{{ $material->titulo }} - Edição do registro</b>
    <div class="card-body">
        <form method="post" action="/edit/{{ $material->id }}">
            @csrf
            @method("put")
            @include('partials.form')
        </form>
  </div>
</div>

<style>
    label{
        margin-bottom:-1px;
    }
    .row{
        padding:10px;
    }
</style>

@endsection
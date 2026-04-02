@extends('laravel-usp-theme::master')
@section('content')


<div class="card text-left">
    <b class="card-header">Cadastrar material</b>
    <div class="card-body">
        <form method="post" action="/store">
            @csrf
            @method("post")
            @include('partials.form')
        </form>

    </div>
</div>


@endsection
@extends("laravel-usp-theme::master")

@section('content')

<div class="card">
    <div class="card-header"><b> {{ $material->titulo }} </b>
        <a href="/material/export/{{ $material->id }}" class="btn btn-success"><i class="fas fa-download"></i></a>
    </div>
    <div class="card-body">
        <p>
            <b>{{ $material->titulo }}</b> ({{ $material->titulo_publicacao }})
        </p>
        <p>
            {{ $material->autores }}
        </p>
        <p>
            {{ $material->data_publicacao }}
        </p>
        <p>
            {{ $material->comentarios }}
        </p>
        <p>
            <a href="{{ $material->localizacao }}">{{ $material->localizacao }}</a>
        </p>
    </div>
</div>

@endsection
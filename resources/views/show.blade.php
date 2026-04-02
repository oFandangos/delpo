@extends("laravel-usp-theme::master")

@section('content')

<div class="card">
    <div class="card-header"><b> {{ $material->titulo }} </b> ({{ $material->titulo_publicacao }})
        <a href="/material/export/{{ $material->id }}" class="btn btn-success"><i class="fas fa-download"></i></a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <p>
                    <b>Autor(es): </b> {{ $material->autores }}
                </p>
            </div>
            <div class="col">
                <p>
                    <b>Data de publicação:</b> {{ $material->data_publicacao }}
                </p>
            </div>
            <div class="col">
                <p>
                    <b>Gênero: </b>{{ $material->genero }}
                </p>
            </div>
            <div class="col">
                <p>
                    <b>Editoras: </b> {{ $material->editoras }}
                </p>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col">
                <p>
                    <b>Comentários: </b> {{ $material->comentarios }}
                </p>
            </div>
            <div class="col">
                <p>
                    <b>Suporte: </b> {{ $material->suporte }}
                </p>
            </div>
            <div class="col">
                <p>
                    <b>Localização: </b><a href="{{ $material->localizacao }}">{{ $material->localizacao }}</a>
                </p>
            </div>
        </div>
        <hr/>
        <p style="text-align:justify;">
            <b>Descrição:</b> {{ $material->descricao }}
        </p>
        @if(in_array(auth()->user()->codpes ?? [], explode(',', config('delpo.admins'))))
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="/edit/{{ $material->id }}"><i class="fas fa-pen"></i></a>
                <form method="post" action="/delete/{{ $material->id }}">
                    @csrf
                    @method("delete")
                    <button type="submit" class="btn btn-danger" onClick="return confirm('Tem certeza que deseja excluir este material?')">
                    <i class="fas fa-trash"></i>
                </button>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
<table class="table table-striped">
        <thead>
            <tr>
                <th>Título (Título pub.)</th>
                <th>Autor(es)</th>
                <th>Editora(s)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materials as $material)
            <tr id="tr" onClick="window.location='/show/{{ $material->id }}'" style="cursor:pointer;">
                <td scope="row">{{$material->titulo}} ({{ $material->titulo_publicacao }})</td>
                <td scope="row">{{$material->autores}}</td>
                <td scope="row">{{$material->editoras}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
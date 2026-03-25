            <div class="row">
                <div class="col">
                    <label><b>Título</b></label>
                    <input type="text" class="form-control" value="{{ old('titulo', $material->titulo) }}" name="titulo">
                </div>
                <div class="col">
                    <label><b>Título de publicação</b></label>
                    <input type="text" class="form-control" value="{{ old('titulo_publicacao', $material->titulo_publicacao) }}" name="titulo_publicacao">
                </div>
                <div class="col">
                    <label><b>Autor(es)</b></label>
                    <input type="text" class="form-control" value="{{ old('autores', $material->autores) }}" name="autores">
                </div>
                <div class="col">
                    <label><b>Editoras</b></label>
                    <input type="text" class="form-control" value="{{ old('editoras',$material->editoras) }}" name="editoras">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label><b>Gênero</b></label>
                    <input type="text" class="form-control" value="{{ old('genero',$material->genero) }}" name="genero">
                </div>
                <div class="col">
                    <label><b>Suporte</b></label>
                    <input type="text" class="form-control" value="{{ old('suporte',$material->suporte) }}" name="suporte">
                </div>
                <div class="col">
                    <label><b>Data de publicação</b></label>
                    <input type="text" class="form-control datepicker" value="{{ old('data_publicacao',$material->data_publicacao) }}" name="data_publicacao">
                </div>
                <div class="col">
                    <label><b>Localização</b></label>
                    <input type="text" class="form-control" value="{{ old('localizacao',$material->localizacao) }}" name="localizacao">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label><b>Comentarios</b></label>
                    <input type="text" class="form-control" value="{{ old('comentarios',$material->comentarios) }}" name="comentarios">
                </div>
            </div>
            <div class="form-group">
                <label for="descricao"><b>Descrição</b></label>
                <textarea class="form-control" name="descricao" id="" rows="8">
                    {{ old('descricao', $material->descricao) }}
                </textarea>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
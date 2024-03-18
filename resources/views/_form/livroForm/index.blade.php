<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="titulo">Titulo</label>
            <input type="text" name="titulo" class="form-control" value="{{isset($livro) ?$livro->titulo: old('titulo') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-9">
            <label for="categoria_id">Categória</label>
            <select name="categoria_id" id="categoria_id" class="form-control select2">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"{{ isset($livro)?($livro->categoria_id = $categoria->id ? 'selected' : '') :'' }}>{{ $categoria->nome }}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-9">
            <label for="ficheiro">Ficheiro</label>
            <input type="file"  name="ficheiro" class="form-control" value="{{isset($livro) ?$livro->ficheiro: old('ficheiro') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-9">
            <label for="imagem">Image de Capa</label>
            <input type="file"  name="imagem" class="form-control" value="{{isset($livro) ?$livro->imagem: old('imagem') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="lt_descricao">Descricao</label>
            <textarea id="lt_descricao" name="lt_descricao" class="form-control"  cols="30" rows="10">{{isset($livro) ?$livro->lt_descricao: old('lt_descricao') }}</textarea>
        </div>
    </div> <!-- /.col -->

</div>

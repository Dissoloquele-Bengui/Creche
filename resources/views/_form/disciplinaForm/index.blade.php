<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{isset($disciplina) ?$disciplina->nome: old('nome') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="codigo">Codigo</label>
            <input type="text" id="codigo" name="codigo" class="form-control" value="{{isset($disciplina) ?$disciplina->codigo: old('codigo') }}">
        </div>
    </div>


</div>

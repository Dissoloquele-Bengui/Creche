<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome" class="form-control" value="{{isset($curso) ?$curso->nome: old('nome') }}">
        </div>

    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="codigo">Código</label>
            <input required type="text" id="codigo" name="codigo" class="form-control" value="{{isset($curso) ?$curso->codigo: old('codigo') }}">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="">Descrição</label>
            <textarea name="descricao" class="form-control p-0" id="" cols="30" rows="10">
                {{isset($curso) ?$curso->descricao: old('descricao') }}
            </textarea>
        </div>
    </div>


</div>

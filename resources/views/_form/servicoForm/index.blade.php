<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome" class="form-control" value="{{isset($servico) ?$servico->nome: old('nome') }}">
        </div>

    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="preco">Preço</label>
            <input required type="text" id="preco" name="preco" class="form-control" value="{{isset($servico) ?$servico->preco: old('preco') }}">
        </div>
    </div>
</div>

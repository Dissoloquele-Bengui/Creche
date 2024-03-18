<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="nome">Nome*</label>
            <input type="text"   name="nome" class="form-control" value="{{isset($loja) ?$loja->nome: old('nome') }}" required>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="nif">NIF*</label>
            <input type="text"   name="nif" class="form-control" value="{{isset($loja) ?$loja->nif: old('nif') }}" required>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="localizacao">LOCALIZAÇÃO*</label>
            <input type="text"   name="localizacao" class="form-control" value="{{isset($loja) ?$loja->localizacao: old('localizacao') }}" required>
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="imagem">Imagem*</label>
            <input type="file"    name="imagem" class="form-control"  {{!isset($loja)?'required':''}}>
        </div>
    </div>
</div>

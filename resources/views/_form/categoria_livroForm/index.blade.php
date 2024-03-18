<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{isset($categoria_livro) ?$categoria_livro->nome: old('nome') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control" id="" cols="30" rows="10">
                {{isset($categoria_livro) ?$categoria_livro->descricao: old('descricao') }}
            </textarea>
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" value="{{isset($projeto) ?$projeto->nome: old('nome') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="imagem">Imagem</label>
            <input type="file" name="imagem" name="imagem" class="form-control" id="" {{isset($projeto)?'':'required'}}>
                
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" name="descricao" class="form-control" rows="4" id="" >
                {{isset($projeto)?$projeto->descricao:old('descricao')}}
            </textarea>
        </div>
    </div>



</div>

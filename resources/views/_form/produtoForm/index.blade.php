<div class="row">
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="nome">Nome*</label>
            <input type="text"   name="nome" class="form-control" value="{{isset($produto) ?$produto->nome: old('nome') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="preco">Preco*</label>
            <input type="number" step="0.01"   name="preco" class="form-control" value="{{isset($produto) ?$produto->preco: old('preco') }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="mb-3 form-group">
            <label for="imagem">Imagem*</label>
            <input type="file"    name="imagem" class="form-control"  {{!isset($produto)?'required':''}}>
        </div>
    </div>

    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="id_loja">Loja*</label>
            @if(!isset($produto))
                <select name="id_loja[]" id="" class="form-control select2" required>
                    @foreach ($lojas as $loja)
                        <option value="{{$loja->id}}" {{isset($produto)?$loja->id==$produto->id_loja?'selected':'':''}}>
                            {{$loja->nome}}
                        </option>
                    @endforeach
                </select>
            @else
                <select name="id_loja" id="" class="form-control select2" required>
                    @foreach ($lojas as $loja)
                        <option value="{{$loja->id}}" {{isset($produto)?$loja->id==$produto->id_loja?'selected':'':''}}>
                            {{$loja->nome}}
                        </option>
                    @endforeach
                </select>
            @endif

        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="qtd">Quantidade*</label>
            <input type="number"    name="qtd" class="form-control" value="{{ isset($produto)?$produto->qtd:old('qtd') }}" {{!isset($produto)?'required':''}}>
        </div>
    </div>

    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="descricao">Descrição*</label>
            <textarea name="descricao" id="" cols="30" rows="10" class="form-control">
                {{isset($produto)?$produto->descricao:''}}
            </textarea>
        </div>
    </div>
</div>

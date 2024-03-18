<div class="row">
    <div class="col-md-12">
        
        <img src="{{asset($venda->caminho)}}" width="100%" height="400px" alt="Comprovativo do Pagamento">
    </div>
    <ul class="col-md-12 list">
        @foreach (getProdutosByFatura($venda->id) as $item)
            <li class="list-item">{{$item->nome}} {{$item->preco}}</li>
        @endforeach
        <li>Total: {{getProdutosByFatura($venda->id)->sum('preco')}}</li>
    </ul>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <select name="estado" id="" class="form-control">
                <option value="0" {{$venda->it_estado == 0?'selected':''}}>Reprovado</option>
                <option value="1" {{$venda->it_estado == 1?'selected':''}}>Aprovado</option>
                <option value="2" {{$venda->it_estado == 2?'selected':''}}>Processando</option>

            </select>
        </div>
    </div>
</div>
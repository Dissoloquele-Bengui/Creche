
<div class="row">
    <div class="col-md-12">
        <div class="form-group mb-3">
            
            <label for="">Comprovativo</label>
            <img src="{{asset($solicitacao->caminho_comprovativo)}}" width="100%" height="400px" alt="Comprovativo do Pagamento">
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="">Serviço</label>
            <select name="servico_id" id="" class="form-control" @readonly(true)>
                <option value="3" {{$solicitacao->servico_id == 3?'selected':''}}>Declaração Com Notas</option>
                <option value="4" {{$solicitacao->servico_id == 4?'selected':''}}>Declaração Sem Notas</option>
                <option value="2" {{$solicitacao->servico_id == 2?'selected':''}}>Cartão Escolar</option>
                <option value="6" {{$solicitacao->servico_id == 6?'selected':''}}>Emissão do Certificado</option>

            </select>
        </div>
    </div>    
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="">Estado</label>
            <select name="estado" id="" class="form-control">
                <option value="2" {{$solicitacao->estado == 2?'selected':''}}>Reprovado</option>
                <option value="1" {{$solicitacao->estado == 1?'selected':''}}>Aprovado</option>
                <option value="0" {{$solicitacao->estado == 0?'selected':''}}>Processando</option>
            </select>
        </div>
    </div>
</div>
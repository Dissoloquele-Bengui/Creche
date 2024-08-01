<div class="row">
    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="vc_nome">Nome*</label>
            <input type="text" id="vc_nome" name="vc_nome" class="form-control" value="{{isset($categoria_notificacao) ?$categoria_notificacao->vc_nome: old('vc_nome') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="lt_descricao">Descrição*</label>
            <textarea class="form-control "name="lt_descricao" id="lt_descricao" cols="30" rows="10">{{isset($categoria_notificacao) ?$categoria_notificacao->lt_descricao: old('lt_descricao') }}</textarea>
        </div>
    </div> <!-- /.col -->
</div>



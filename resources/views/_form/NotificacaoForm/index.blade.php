<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="vc_assunto">Assunto</label>
            <input type="text" id="vc_assunto" name="vc_assunto" class="form-control" value="{{isset($Notificacao) ?$Notificacao->vc_assunto: old('vc_assunto') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-9">
            <label for="it_id_categoria">Categória</label>
            <select name="it_id_categoria" id="it_id_categoria" class="form-control select2">
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}"{{ isset($Notificacao)?($Notificacao->it_id_categoria = $categoria->id ? 'selected' : '') :'' }}>{{ $categoria->vc_nome }}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="dt_data">Data</label>
            <input type="date" id="dt_data" name="dt_data" class="form-control" value="{{isset($Notificacao) ?$Notificacao->dt_data: old('dt_data') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-4">
        <div class="form-group mb-9">
            <label for="tm_hora">Hora</label>
            <input type="time" id="tm_hora" name="tm_hora" class="form-control" value="{{isset($Notificacao) ?$Notificacao->tm_hora: old('tm_hora') }}">
        </div>
    </div> <!-- /.col -->

    <!-------------------------------------------------------->
    <div class="col-md-4">
        <div class="form-group mb-9">
            <label for="it_id_turma">Turmas</label>
            <select onchange="{{isset($Notificacao) ?'getApartamentosUpdate('. $Notificacao->id .')': 'getApartamentos()'}}" name="it_id_turma[]" id="it_id_turma{{isset($Notificacao) ?$Notificacao->id: ''}}" class="form-control select2" >
                <option value="All" >All</option>
                @foreach($turmas as $turma)
                    <option value="{{ $turma->id }}">{{ $turma->nome }}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <!-------------------------------------------------------->
    <div class="col-md-12">
        <div class="form-group mb-3">
            <label for="lt_descricao">Descricao</label>
            <textarea id="lt_descricao" name="lt_descricao" class="form-control"  cols="30" rows="10">{{isset($Notificacao) ?$Notificacao->lt_descricao: old('lt_descricao') }}</textarea>
        </div>
    </div> <!-- /.col -->

</div>

<div class="row">
    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="montante">Montante*</label>
            <input type="text"   name="montante" class="form-control" value="{{isset($cheque_refeicao) ?$cheque_refeicao->montante: old('montante') }}" required>
        </div>
    </div>
    <div class="col-md-12">
        <div class="mb-3 form-group">
            <label for="usuario">Cliente*</label>
            <select name="id_cliente" id="" class="form-control select2" >
                @foreach ($users as $user)
                    <option value="{{$user->id}}" {{isset($cheque_refeicao)?$user->id==$cheque_refeicao->id_cliente?'selected':'':''}}>
                        {{$user->name}}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

</div>

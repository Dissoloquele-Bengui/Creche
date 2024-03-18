
<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-3">
            <label for="valor">Valor</label>
            <input type="number" id="valor" name="valor" class="form-control" value="{{isset($ano) ?$ano->valor: old('valor') }}">
        </div>
        <div class="form-group mb-3">
            <label for="propina_id">Mes</label>
            <select id="propina_id" name="propina_id" class="form-control" >
                <option value="{{$propina->id}}">
                    {{$propina->mes}}
                </option>
            </select>
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="matricula_id">Nº de Processo</label>
            <input type="number" id="matricula_id" name="matricula_id" class="form-control" value="{{isset($ano) ?$ano->matricula_id: old('matricula_id') }}">
        </div>

    </div>


</div>

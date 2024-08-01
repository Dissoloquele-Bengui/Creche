<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="data_inicio">Ano de Inicio</label>
            <input type="number" id="data_inicio" name="data_inicio" class="form-control" value="{{isset($ano) ?$ano->data_inicio: old('data_inicio') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="data_fim">Ano de Termino</label>
            <input type="number" id="data_fim" name="data_fim" class="form-control" value="{{isset($ano) ?$ano->data_fim: old('data_fim') }}">
        </div>
    </div>


</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="mes">Mês</label>
            <input required type="text" id="mes" name="mes" class="form-control" value="{{isset($propina) ?$propina->mes: old('mes') }}">
        </div>
        <div class="form-group mb-3">
            <label for="limite">Data de Vencimento</label>
            <input required type="date" id="data_vencimento" name="data_vencimento" class="form-control" value="{{isset($propina) ?$propina->data_vencimento: old('data_vencimento') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="limite">Limite</label>
            <input required type="number" id="limite" name="limite" class="form-control" value="{{isset($propina) ?$propina->limite: old('limite') }}">
        </div>

    </div>


</div>

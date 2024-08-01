<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="mes">Mês</label>
            <input required type="text" id="mes" name="mes" class="form-control" value="{{isset($propina) ?$propina->mes: old('mes') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="limite">Data de Vencimento</label>
            <input required type="date" id="data_vencimento" name="data_vencimento" class="form-control" value="{{isset($propina) ?$propina->data_vencimento: old('data_vencimento') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="limite">Limite</label>
            <input required type="number" id="limite" name="limite" class="form-control" value="{{isset($propina) ?$propina->limite: old('limite') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="classe">Ano</label>
            <select name="classe" class="form-control" id="" required>
                @foreach ($classes as $classe)
                    <option value="{{ $classe->id }}" @if (isset($propina) ? $propina->idClasse==$classe->id : old('classe')==$classe->id)
                    selected
                    @endif>{{ $classe->nome }}</option>
                @endforeach
            </select>
        </div>
    </div>


</div>

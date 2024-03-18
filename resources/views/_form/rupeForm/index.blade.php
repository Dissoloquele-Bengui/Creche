<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="codigo">Código</label>
            <input type="text" id="codigo" name="codigo" class="form-control" value="{{isset($rupe) ?$rupe->codigo: old('codigo') }}">
        </div>
    </div> <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="id_servico">Serviços</label>
            <select name="id_servico" class="form-control" id="">
                @foreach ($servicos as $servico)
                    <option value="{{$servico->id}}" @if (isset($rupe)){{ $rupe->id_servico==$servico->id ?'selected':'' }}  @endif> {{$servico->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>

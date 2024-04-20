<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="nome">Nome</label>
            <input required type="text" id="nome" name="nome" class="form-control" value="{{isset($turma) ?$turma->nome: old('nome') }}">
        </div>
        <div class="mb-3 form-group">
            <label for="limite">Capacidade Máxima</label>
            <input required type="number" id="limite" name="limite" class="form-control" value="{{isset($turma) ?$turma->limite: old('limite') }}">
        </div>

    </div> <!-- /.col -->
    <div class="col-md-6">

        <div class="mb-3 form-group">
            <label for="idClasse">Classe</label>
            <select name="idClasse" class="form-control" id="">
                @foreach ($classes as $classe)
                    <option value="{{$classe->id}}" @if (isset($turma)){{ $turma->idClasse==$classe->id ?'selected':'' }}  @endif> {{$classe->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="idAno">Ano Lectivo</label>
            <select name="idAno" class="form-control" id="">
                @foreach ($anos as $ano)
                    <option value="{{$ano->id}}" @if (isset($turma)){{ $turma->idAno==$ano->id ?'selected':'' }}  @endif> {{$ano->data_inicio}} -- {{$ano->data_fim}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

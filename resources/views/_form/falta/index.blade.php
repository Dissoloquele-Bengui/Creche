<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="matricula">Nº de Processo</label>
            <input type="number" name="matricula" id="matricula" class="form-control">
        </div>


        <div class="form-group mb-3">
            <label for="data">Data</label>
            <input type="date" class="form-control" name="data" id="">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="idDisciplina">Disciplina</label>
            <select name="idDisciplina" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($turma)){{ $turma->idDisciplina==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

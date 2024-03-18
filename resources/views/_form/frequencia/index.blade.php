<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="idTurma">Turma</label>
            <select name="idTurma" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($turma)){{ $turma->idTurma==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="idTrimestre">Trimestre</label>
            <select name="idTrimestre" class="form-control" id="">
                <option value="1">Iº</option>
                <option value="2">IIº</option>
                <option value="3">IIIº</option>
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="idDisciplina">Disciplina</label>
            <select name="idDisciplina" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($turma)){{ $turma->idDisciplina==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="data">Data</label>
            <input type="date" class="form-control" name="data" id="">
        </div>

    </div>
</div>

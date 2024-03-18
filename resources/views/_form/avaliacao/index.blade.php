<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="idTurma">Turma</label>
            <select name="idTurma" class="form-control select2" id="it_id_turma" onchange="getDisciplinaByTurma()" required>
                <option value="" selected disabled>Selecione uma turma</option>
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($turma)){{ $turma->idTurma==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="idDisciplina">Disciplina</label>
            <select name="idDisciplina" class="form-control" id="it_id_disciplina">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($turma)){{ $turma->idDisciplina==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="trimestre">Trimestre</label>
            <select name="trimestre" class="form-control" id="">
                <option value="1" >Iº</option>
                <option value="2" >IIº</option>
                <option value="3" >IIIº</option>
            </select>
        </div>
    </div> <!-- /.col -->

</div>

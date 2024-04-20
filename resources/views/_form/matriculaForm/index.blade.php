<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="aluno_id">Criança</label>
            <select name="aluno_id" class="form-control" id="">
                @foreach ($alunos as $aluno)
                    <option value="{{$aluno->id}}" @if (isset($matricula)){{ $matricula->aluno_id==$aluno->id ?'selected':'' }}  @endif> {{$aluno->nome}} {{$aluno->sobrenome}}</option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="turma_id">Turma</label>
            <select name="turma_id" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($matricula)){{ $matricula->turma_id==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

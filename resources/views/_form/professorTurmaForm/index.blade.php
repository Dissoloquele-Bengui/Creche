<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-3">
            <label for="professor_id">Educador</label>
            <select name="professor_id" class="form-control" id="">
                @if (isset($professor))
                    <option value="{{$professor->id}}" > {{$professor->nome}} </option>
                @endif
                @if (isset($professorTurma))
                    <option value="{{$professorTurma->professor_id}}" > {{$professorTurma->professor}} </option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="turma_id">Turma</label>
            <select name="turma_id" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($professorTurma)){{ $professorTurma->turma_id==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>


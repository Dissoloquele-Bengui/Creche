<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="professor_id">Professor</label>
            <select name="professor_id" required class="form-control" id="">
                @foreach ($professors as $professor)
                    <option value="{{$professor->id}}" @if (isset($plano_aula)){{ $plano_aula->professor_id==$professor->id ?'selected':'' }}  @endif> {{$professor->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="curso_id">Curso</label>
            <select name="curso_id" required class="form-control" id="">
                @foreach ($cursos as $curso)
                    <option value="{{$curso->id}}" @if (isset($plano_aula)){{ $plano_aula->curso_id==$curso->id ?'selected':'' }}  @endif> {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="turma_id">Turma</label>
            <select name="turma_id" required class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($plano_aula)){{ $plano_aula->turma_id==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="caminho">Ficheiro</label>
            <input type="file" class="form-control" name="caminho" {{isset($plano_aula)?'required':''}}>
        </div>
    </div> <!-- /.col -->
</div>

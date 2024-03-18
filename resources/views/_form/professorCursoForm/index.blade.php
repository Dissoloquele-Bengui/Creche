<div class="row">
    <div class="col-md-6">

        <div class="form-group mb-3">
            <label for="professor_id">Professor</label>
            <select name="professor_id" class="form-control" id="">
                @if (isset($professor))
                    <option value="{{$professor->id}}" > {{$professor->nome}} </option>
                @endif
                @if (isset($professorCurso))
                    <option value="{{$professorCurso->professor_id}}" > {{$professorCurso->professor}} </option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="curso_id">Curso</label>
            <select name="curso_id" class="form-control" id="">
                @foreach ($cursos as $curso)
                    <option value="{{$curso->id}}" @if (isset($professorCurso)){{ $professorCurso->curso_id==$curso->id ?'selected':'' }}  @endif> {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>


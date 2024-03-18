<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="curso_id">Curso</label>
            <select name="curso_id" class="form-control" id="">
                @foreach ($cursos as $curso)
                    <option value="{{$curso->id}}" @if (isset($classeDisciplina)){{ $classeDisciplina->curso_id==$curso->id ?'selected':'' }}  @endif> {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group mb-3">
            <label for="classe_id">Curso</label>
            <select name="classe_id" class="form-control" id="">
                @if (isset($classes))
                    <option value="{{$classes->id}}" > {{$classes->nome}} </option>
                @endif
                @if (isset($classeDisciplina))
                    <option value="{{$classeDisciplina->id}}" > {{$classeDisciplina->classe}} </option>
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="disciplina_id">Disciplina</label>
            <select name="disciplina_id" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->disciplina_id}}" @if (isset($classeDisciplina)){{ $classeDisciplina->disciplina_id==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>


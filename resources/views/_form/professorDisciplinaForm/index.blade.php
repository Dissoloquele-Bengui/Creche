<div class="row">
    <div class="col-md-3">

        <div class="form-group mb-3">
            <label for="professor_id">Professor</label>
            <select name="professor_id" class="form-control" id="">
                @if (isset($professores))
                    <option value="{{$professores->id}}" > {{$professores->nome}} </option>
                @endif
                @if (isset($professorDisciplina))
                    <option value="{{$professorDisciplina->professor_id}}" > {{$professorDisciplina->name}} </option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label for="curso_id">Curso</label>
            <select name="curso_id" class="form-control" id="">
                @foreach ($cursos as $curso)

                    <option value="{{$curso->id}}" @if (isset($professorDisciplina)){{ $professorDisciplina->curso_id==$curso->id ?'selected':'' }}  @endif> {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group mb-3">
            <label for="classe_id">Classe</label>
            <select name="classe_id" class="form-control" id="">
                @if (isset($classes))
                    @foreach ($classes as $classe )
                        <option value="{{$classe->id}}" @if (isset($professorDisciplina)){{ $professorDisciplina->classe_id==$classe->id ?'selected':'' }}  @endif > {{$classe->nome}} </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group mb-3">
            <label for="disciplina_id">Disciplina</label>
            <select name="disciplina_id" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($professorDisciplina)){{ $professorDisciplina->disciplina_id==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>


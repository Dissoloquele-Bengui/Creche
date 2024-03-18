<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="curso_id">Curso</label>
            <select name="curso_id" class="form-control" id="">
                @foreach ($cursos as $curso)

                    <option value="{{$curso->id}}" @if (isset($cursoDisciplina)){{ $cursoDisciplina->curso_id==$curso->id ?'selected':'' }}  @endif> {{$curso->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">

        <div class="form-group mb-3">
            <label for="classe_id">Classe</label>
            <select name="classe_id" class="form-control" id="">
                @if (isset($classes))
                    @foreach ($classes as $classe )
                        <option value="{{$classe->id}}" @if (isset($cursoDisciplina)){{ $cursoDisciplina->classe_id==$classe->id ?'selected':'' }}  @endif > {{$classe->nome}} </option>
                    @endforeach
                @endif
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="disciplina_id">Disciplina</label>
            <select name="disciplina_id" class="form-control" id="">
                @foreach ($disciplinas as $disciplina)
                    <option value="{{$disciplina->id}}" @if (isset($cursoDisciplina)){{ $cursoDisciplina->disciplina_id==$disciplina->id ?'selected':'' }}  @endif> {{$disciplina->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>


</div>


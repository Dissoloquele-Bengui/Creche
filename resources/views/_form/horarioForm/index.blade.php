<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="caminho">Ficheiro</label>
            <input type="file" class="form-control" name="caminho" {{isset($horario)?'required':''}}>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="turma_id">Turma</label>
            <select name="turma_id" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($matricula)){{ $matricula->turma_id==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="idTurma">Turma</label>
            <select name="idTurma" class="form-control" id="">
                @foreach ($turmas as $turma)
                    <option value="{{$turma->id}}" @if (isset($turma)){{ $turma->idTurma==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 form-group">
            <label for="idTrimestre">Trimestre</label>
            <select name="idTrimestre" class="form-control" id="">
                <option value="1">Iº</option>
                <option value="2">IIº</option>
                <option value="3">IIIº</option>
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">
        <div class="mb-3 form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" name="data" id="">
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="codigo">Aluno</label>
            <select name="id_aluno" class="form-control" >
                @foreach (getAlunos() as $aluno)
                    
                    <option value="{{$aluno->id}}" > {{$aluno->primeiro_nome}} {{$aluno->ultimo_nome}} </option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="codigo">Classe</label>
            <select name="id_classe" class="form-control" >
                @foreach (getClasses() as $classe)
                    <option value="{{$classe->id}}" > {{$classe->nome}} </option>
                @endforeach
            </select>
        </div>
    </div> <!-- /.col -->
    
    <div class="col-md-4">
        <div class="form-group mb-3">
            <label for="id_servico">Serviços</label>
            <select name="id_servico" class="form-control" >
                <option value="1" > Declaração sem notas </option>
                <option value="2" > Declaração com notas </option>
                <option value="3" > Cartão Escolar </option>
            </select>
        </div>
    </div>


</div>

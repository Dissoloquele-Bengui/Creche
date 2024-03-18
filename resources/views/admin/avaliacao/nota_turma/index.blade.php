@extends('layout.admin.body')
@section('titulo','Registar Avaliações')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Consultar Notas</strong>
        </div>
        <form action="{{route('admin.avaliacao.consultarNotaTurma')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="idTurma">Turma</label>
                            <select name="idTurma" class="form-control" id="">
                                @foreach ($turmas as $turma)
                                    <option value="{{$turma->id}}" @if (isset($turma)){{ $turma->idTurma==$turma->id ?'selected':'' }}  @endif> {{$turma->nome}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div> <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="trimestre">Trimestre</label>
                            <select name="trimestre" class="form-control" id="">
                                <option value="1" >Iº</option>
                                <option value="2" >IIº</option>
                                <option value="3" >IIIº</option>
                            </select>
                        </div>
                    </div> <!-- /.col -->
                </div>

                <button type="submit" class="btn btn-primary w-md">Consultar</button>
            </div>
        </form>
    </div>
@endsection

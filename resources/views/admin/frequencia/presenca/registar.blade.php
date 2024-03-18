@extends('layout.admin.body')
@section('titulo','Registrar Frequencia')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-around">
            <strong class="card-title">Registrar Frequencias de {{ $disciplina->nome }}</strong>
            <strong>Turma {{ $turma->nome }}</strong>
        </div>
        <form action="registarFrequencia/{{$disciplina_id}}/{{$data_atual}}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row justify-content-end pb-3">

                </div>
                @foreach ($alunos as $aluno)
                    <div class="row pt-3">
                        <p class="col-md-6">
                            {{ $aluno->primeiro_nome }} {{ $aluno->nome_meio }} {{ $aluno->ultimo_nome }}
                        </p>
                        <div class="col-md-2">
                            <select name="frequencia[{{ $aluno->idMatricula }}][{{ $aluno->idMatricula }}]" id="" class="form-control mb-3">
                                <option value="Presente" {{$aluno->frequencia=="Presente"?'selected':''}}>Presente</option>
                                <option value="Ausente" {{$aluno->frequencia=="Ausente"?'selected':''}}>Ausente</option>
                            </select>
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary w-md ">Lançar</button>
            </div>
        </form>

    </div>
@endsection

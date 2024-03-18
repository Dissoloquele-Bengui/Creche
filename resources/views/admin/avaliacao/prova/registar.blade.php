@extends('layout.admin.body')
@section('titulo','Lançar Nota da Prova')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-around">
            <strong class="card-title">Lançar Notas de {{ $disciplina->nome }}</strong>
            <strong>Curso {{ $turma->curso }}</strong>
            <strong>Turma {{ $turma->nome }}</strong>
            <strong>Ano Lectivo {{ $turma->data_inicio }} -- {{ $turma->data_fim }}</strong>
        </div>
        <form action="{{ route('admin.avaliacao.registarProva', ['disciplina_id' => $disciplina->id]) }}" method="POST">
            @csrf
            <input type="hidden" value="{{$trimestre}}" name="trimestre">
            <div class="card-body">
                @foreach ($alunos as $aluno)
                    <div class="row pt-3">
                        <p class="col-md-6">
                            {{ $aluno->primeiro_nome }} {{ $aluno->nome_meio }} {{ $aluno->ultimo_nome }}
                        </p>
                        
                        <div class="col-md-2">
                            <input type="number" class="form-control" placeholder="P1" required name="notas[{{ $aluno->idMatricula }}][p1]" value="{{ isset($aluno->avaliacoes['p1']) ? $aluno->avaliacoes['p1'] : '' }}">
                        </div>
                        <div class="col-md-2">
                            <input type="number" class="form-control" placeholder="P2" required name="notas[{{ $aluno->idMatricula }}][p2]" value="{{ isset($aluno->avaliacoes['p2']) ? $aluno->avaliacoes['p2'] : '' }}">
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary w-md">Lançar</button>
            </div>
        </form>

    </div>
@endsection

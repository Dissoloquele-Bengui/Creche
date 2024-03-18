@extends('layout.admin.body')
@section('titulo','Registar Nota da Avaliação')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-around">
            <strong class="card-title">Registar Avaliações de {{ $disciplina->nome }}</strong>
            <strong>Curso {{ $turma->curso }} </strong>
            <strong>Turma {{ $turma->nome }} </strong>
            <strong>Ano Lectivo {{ $turma->data_inicio }} -- {{ $turma->data_fim }} </strong>
        </div>
        <form action="{{ route('admin.avaliacao.registarAvaliacao', ['disciplina_id' => $disciplina->id]) }}" method="POST">
            @csrf
            <div class="card-body justify-content-center text-center">
                @foreach ($alunos as $aluno)
                    <div class="row pt-3  mb-3">
                        <p class="col-md-6">
                            {{ $aluno->primeiro_nome }} {{ $aluno->nome_meio }} {{ $aluno->ultimo_nome }}
                        </p>
                        <div class="col-md-3">
                            <input type="number" class="form-control" placeholder="MAC"  name="notas[{{ $aluno->idMatricula }}][av]" value="{{ isset($aluno->avaliacoes) ? $aluno->avaliacoes : '' }}">
                        </div>
                    </div>
                @endforeach
                <input type="hidden" value="{{ $disciplina->id }}" name="disciplina_id">
                <input type="hidden" value="{{ $data }}" name="data">
                <input type="hidden" value="{{ $trimestre }}" name="trimestre">
                <button type="submit" class="btn btn-primary w-md mt-5" >Lançar</button>
            </div>
        </form>

    </div>
@endsection

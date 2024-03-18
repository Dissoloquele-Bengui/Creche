@extends('layout.admin.body')
@section('titulo','Justificar Falta')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-around">
            <strong class="card-title">Justificar Faltas de {{ $disciplina->nome }}</strong>
            <strong>Nome do Aluno: {{ $aluno->primeiro_nome }} {{ $aluno->ultimo_nome }}</strong>
        </div>
        <form action="{{ route('admin.falta.registarJustificativa') }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row pb-3">
                    <div class="col-md-8">
                        <textarea name="justificativa" id="" rows="10" class="form-control"></textarea>
                    </div>
                    <input type="hidden" id="frequencia_id" name="frequencia_id"  value="{{ $frequencia->id }}">
                    <input type="hidden" id="data_falta" name="data_falta"  value="{{ $data_falta }}">

                </div>
                <button type="submit" class="btn btn-primary w-md ">Lançar</button>
            </div>
        </form>

    </div>
@endsection

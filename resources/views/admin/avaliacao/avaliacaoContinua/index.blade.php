@extends('layout.admin.body')
@section('titulo','Avaliações Continuas')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Avaliações Continuas</strong>
        </div>
        <form action="{{route('admin.avaliacao.lancarAvaliacao')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.avaliacao_continua.index')
                <button type="submit" class="btn btn-primary w-md">Lançar</button>
            </div>
        </form>
    </div>
@endsection

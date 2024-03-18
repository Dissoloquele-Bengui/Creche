@extends('layout.admin.body')
@section('titulo','Consultar Avaliações')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Consultar Avaliações</strong>
        </div>
        <form action="{{route('admin.avaliacao.consultarNotaAvaliacao')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.avaliacao.index')
                <button type="submit" class="btn btn-primary w-md">Consultar</button>
            </div>
        </form>
    </div>
@endsection

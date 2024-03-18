@extends('layout.admin.body')
@section('titulo','Registar Avaliações')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Lançar Notas</strong>
        </div>
        <form action="{{route('admin.avaliacao.lancarProva')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.avaliacao.index')
                <button type="submit" class="btn btn-primary w-md">Lançar</button>
            </div>
        </form>
    </div>
   
@endsection

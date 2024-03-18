@extends('layout.admin.body')
@section('titulo','Registar Presença')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Registar Presença</strong>
        </div>
        <form action="{{route('admin.frequencia.lancarFrequencia')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.frequencia.index')
                <button type="submit" class="btn btn-primary w-md">Lançar</button>
            </div>
        </form>
    </div>
@endsection

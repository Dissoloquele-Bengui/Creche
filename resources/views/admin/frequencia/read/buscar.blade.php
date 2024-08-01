@extends('layout.admin.body')
@section('titulo','Consultar Frequência')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Consultar Frequência</strong>
        </div>
        <form action="{{route('admin.frequencia.verFrequencia')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.frequencia.index')
                <button type="submit" class="btn btn-primary w-md">Consultar</button>
            </div>
        </form>
    </div>
@endsection

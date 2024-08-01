@extends('layout.admin.body')
@section('titulo','Registar Presença')

@section('conteudo')
    <div class="mb-4 shadow card">
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

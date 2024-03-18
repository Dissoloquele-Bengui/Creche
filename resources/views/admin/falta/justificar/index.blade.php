@extends('layout.admin.body')
@section('titulo','Justificar Falta')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Justificar Falta</strong>
        </div>
        <form action="{{route('admin.falta.justificarFalta')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.falta.index')
                <button type="submit" class="btn btn-primary w-md">Lançar</button>
            </div>
        </form>
    </div>
@endsection

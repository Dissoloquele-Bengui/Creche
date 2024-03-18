@extends('layout.admin.body')
@section('titulo','Vincular Curso Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Vincular Curso Disciplina</strong>
        </div>
        <form action="{{route('admin.curso.storeVinculoDisciplina')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.cursoDisciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

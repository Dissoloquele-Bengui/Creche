@extends('layout.admin.body')
@section('titulo','Vincular Curso a Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Vincular Curso a Disciplina</strong>
        </div>
        <form action="{{route('admin.classe.storeVinculoDisciplina')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.classeDisciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

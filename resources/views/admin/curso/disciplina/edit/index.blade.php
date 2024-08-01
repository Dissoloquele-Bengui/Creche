@extends('layout.admin.body')
@section('titulo','Actualizar Vinculo de Curso Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Vinculo de Curso Disciplina</strong>
        </div>
        <form action="{{ route('admin.curso.updateVinculoDisciplina', ['id' => $cursoDisciplina->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.cursoDisciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

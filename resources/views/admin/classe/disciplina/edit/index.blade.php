@extends('layout.admin.body')
@section('titulo','Actualizar Vinculo de Ano Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Vinculo de Ano Disciplina</strong>
        </div>
        <form action="{{ route('admin.classe.update', ['id' => $classeDisciplina->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.classeDisciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@endsection

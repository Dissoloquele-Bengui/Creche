@extends('layout.admin.body')
@section('titulo','Actualizar Atribuição')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Atribuição</strong>
        </div>
        <form action="{{ route('admin.professor.updateVinculoCurso', ['id' => $professorCurso->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorCursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('professorCurso.create.success'))
    <script>
        Swal.fire(
            'Vinculo de Professor e Curso Editado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('professorCurso.create.error'))
    <script>
        Swal.fire(
            'Erro ao Editar Vinculo de Professor e Curso!',
            '',
            'error'
        )
    </script>
@endif
@endsection

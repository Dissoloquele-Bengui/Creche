@extends('layout.admin.body')
@section('titulo','Atribuir Curso')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Atribuir Curso</strong>
        </div>
        <form action="{{route('admin.professor.storeVinculoCurso')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorCursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Atribuir</button>
            </div>
        </form>
    </div>
@if (session('professorCurso.create.success'))
    <script>
        Swal.fire(
            'Vinculo de Educador e Curso efectuado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('professorCurso.create.error'))
    <script>
        Swal.fire(
            'Erro ao tentar Vinculo de Educador e Curso!',
            '',
            'error'
        )
    </script>
@endif

@endsection

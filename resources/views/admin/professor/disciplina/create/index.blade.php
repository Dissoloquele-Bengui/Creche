@extends('layout.admin.body')
@section('titulo','Atribuir Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Atribuir Disciplina</strong>
        </div>
        <form action="{{route('admin.professor.storeVinculoDisciplina',)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorDisciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Atribuir</button>
            </div>
        </form>
    </div>
@if (session('professorDisciplina.create.success'))
    <script>
        Swal.fire(
            'Disciplina Vinculada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('professorDisciplina.create.error'))
    <script>
        Swal.fire(
            'Erro ao Vincular Disciplina ao Educador!',
            '',
            'error'
        )
    </script>
@endif
@endsection

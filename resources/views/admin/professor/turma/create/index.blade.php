@extends('layout.admin.body')
@section('titulo','Atribuir Turma')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Atribuir Turma</strong>
        </div>
        <form action="{{route('admin.professor.storeVinculoTurma')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorTurmaForm.index')
                <button type="submit" class="btn btn-primary w-md">Atribuir</button>
            </div>
        </form>
    </div>
@if (session('professorTurma.create.success'))
    <script>
        Swal.fire(
            'Turma Vinculada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('professorTurma.create.error'))
    <script>
        Swal.fire(
            'Erro ao Vincular Turma!',
            '',
            'error'
        )
    </script>
@endif

@endsection

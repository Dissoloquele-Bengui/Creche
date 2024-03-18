@extends('layout.admin.body')
@section('titulo','Actualizar Disciplina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Disciplina</strong>
        </div>
        <form action="{{ route('admin.disciplina.update', ['id' => $disciplina->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.disciplinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('disciplina.update.success'))
    <script>
        Swal.fire(
            'Disciplina Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('disciplina.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Disciplina!',
            '',
            'error'
        )
    </script>
@endif
@endsection

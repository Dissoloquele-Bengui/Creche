@extends('layout.admin.body')
@section('titulo','Actualizar Projeto')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Projeto</strong>
        </div>
        <form action="{{ route('admin.projeto.update', ['id' => $projeto->id]) }}
" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('_form.projetoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('projeto.update.success'))
    <script>
        Swal.fire(
            'Projeto Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('projeto.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Projeto!',
            '',
            'error'
        )
    </script>
@endif
@endsection

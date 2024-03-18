@extends('layout.admin.body')
@section('titulo','Actualizar Densidade')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Densidade</strong>
        </div>

    </div>

@if (session('loja.update.success'))
    <script>
        Swal.fire(
            'Densidade Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Densidade!',
            '',
            'error'
        )
    </script>
@endif

@endsection

@extends('layout.admin.body')
@section('titulo','Cadastrar Densidade')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Densidade</strong>
        </div>

    </div>

@if (session('loja.create.success'))
    <script>
        Swal.fire(
            'Densidade Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('loja.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Densidade!',
            '',
            'error'
        )
    </script>
@endif

@endsection

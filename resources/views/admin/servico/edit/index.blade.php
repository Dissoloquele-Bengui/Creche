@extends('layout.admin.body')
@section('titulo','Actualizar Serviço')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Serviço</strong>
        </div>
        <form action="{{ route('admin.servico.update', ['id' => $servico->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.servicoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('servico.update.success'))
    <script>
        Swal.fire(
            'Serviço Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('servico.update.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Serviço!',
            '',
            'error'
        )
    </script>
@endif
@endsection

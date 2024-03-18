@extends('layout.admin.body')
@section('titulo','Cadastrar Serviço')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Serviço</strong>
        </div>
        <form action="{{route('admin.servico.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.servicoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('servico.create.success'))
    <script>
        Swal.fire(
            'Serviço Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('servico.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Serviço!',
            '',
            'error'
        )
    </script>
@endif
@endsection

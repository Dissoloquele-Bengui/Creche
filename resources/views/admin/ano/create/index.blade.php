@extends('layout.admin.body')
@section('titulo','Cadastrar Ano Lectivo')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Ano Lectivo</strong>
        </div>
        <form action="{{route('admin.ano.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.anoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('Ano.create.success'))
    <script>
        Swal.fire(
            'Ano Letivo Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Ano.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Ano Letivo!',
            '',
            'error'
        )
    </script>
@endif
@endsection

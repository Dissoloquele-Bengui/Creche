@extends('layout.admin.body')
@section('titulo','Cadastrar Projeto')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Projeto</strong>
        </div>
        <form action="{{route('admin.projeto.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('_form.projetoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('projeto.create.success'))
    <script>
        Swal.fire(
            'Projeto Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('projeto.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Projeto!',
            '',
            'error'
        )
    </script>
@endif
@endsection

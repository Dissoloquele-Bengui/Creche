@extends('layout.admin.body')
@section('titulo','Cadastrar Criança')

@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header">
        <strong class="card-title">Cadastrar Criança</strong>
        </div>
        <form action="{{route('admin.aluno.store')}}" method="post" enctype="multipart/data">
            @csrf
            <div class="card-body">
                @include('_form.alunoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('aluno.create.success'))
    <script>
        Swal.fire(
            'Criança Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('aluno.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Criança!',
            '',
            'error'
        )
    </script>
@endif
@endsection

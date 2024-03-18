@extends('layout.admin.body')
@section('titulo','Cadastrar Aluno')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Aluno</strong>
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
            'Aluno Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('aluno.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Aluno!',
            '',
            'error'
        )
    </script>
@endif
@endsection

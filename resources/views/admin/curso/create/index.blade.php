@extends('layout.admin.body')
@section('titulo','Cadastrar Curso')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Curso</strong>
        </div>
        <form action="{{route('admin.curso.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.cursoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('curso.create.success'))
    <script>
        Swal.fire(
            'Curso Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('curso.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Curso!',
            '',
            'error'
        )
    </script>
@endif
@endsection

@extends('layout.admin.body')
@section('titulo','Cadastrar Professor')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Professor</strong>
        </div>
        <form action="{{route('admin.professor.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.professorForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('professor.create.success'))
    <script>
        Swal.fire(
            'Professor Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('professor.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Classe!',
            '',
            'error'
        )
    </script>
@endif

@endsection

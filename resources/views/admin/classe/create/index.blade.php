@extends('layout.admin.body')
@section('titulo','Cadastrar Classe')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Classe</strong>
        </div>
        <form action="{{route('admin.classe.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.classeForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('classe.create.success'))
    <script>
        Swal.fire(
            'Classe Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('classe.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Classe!',
            '',
            'error'
        )
    </script>
@endif
@endsection

@extends('layout.admin.body')
@section('titulo','Matricular')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Matricular</strong>
        </div>
        <form action="{{route('admin.matricula.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.matriculaForm.index')
                <button type="submit" class="btn btn-primary w-md">Matricular</button>
            </div>
        </form>
    </div>
@if (session('matricula.create.success'))
    <script>
        Swal.fire(
            'Matricula Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('matricula.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Matricula!',
            '',
            'error'
        )
    </script>
@endif
@endsection

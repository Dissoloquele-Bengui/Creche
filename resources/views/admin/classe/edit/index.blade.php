@extends('layout.admin.body')
@section('titulo','Actualizar Ano')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Ano</strong>
        </div>
        <form action="{{route('admin.classe.update',$classe->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.classeForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('classe.update.success'))
    <script>
        Swal.fire(
            'Classe Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('classe.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Ano!',
            '',
            'error'
        )
    </script>
@endif
@endsection

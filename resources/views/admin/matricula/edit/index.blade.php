@extends('layout.admin.body')
@section('titulo','Actualizar Matricula')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Matricula</strong>
        </div>
        <form action="{{route('admin.matricula.update',$matricula->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.matriculaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('matricula.update.success'))
    <script>
        Swal.fire(
            'Matricula Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('matricula.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Matricula!',
            '',
            'error'
        )
    </script>
@endif
@endsection

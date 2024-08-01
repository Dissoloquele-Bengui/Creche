@extends('layout.admin.body')
@section('titulo','Actualizar Criança')

@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header">
        <strong class="card-title">Actualizar Criança</strong>
        </div>
        <form action="{{route('admin.aluno.update',$aluno->id)}}" method="post" enctype="multipart/data">
            @csrf
            <div class="card-body">
                @include('_form.alunoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('aluno.update.success'))
    <script>
        Swal.fire(
            'Criança Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('aluno.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Criança!',
            '',
            'error'
        )
    </script>
@endif
@endsection

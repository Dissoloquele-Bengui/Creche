@extends('layout.admin.body')
@section('titulo','Actualizar Ano Lectivo')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Ano Lectivo</strong>
        </div>
        <form action="{{ route('admin.ano.update', ['id' => $ano->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.anoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('Ano.update.success'))
    <script>
        Swal.fire(
            'Ano Letivo Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Ano.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Ano Letivo!',
            '',
            'error'
        )
    </script>
@endif
@endsection

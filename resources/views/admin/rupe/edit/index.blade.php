@extends('layout.admin.body')
@section('titulo','Actualizar Rupe')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Actualizar Rupe</strong>
        </div>
        <form action="{{ route('admin.rupe.update', ['id' => $rupe->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.rupeForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('rupe.update.success'))
    <script>
        Swal.fire(
            'Rupe Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('rupe.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Rupe!',
            '',
            'error'
        )
    </script>
@endif
@endsection

{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Categoria de Notificacão</strong>
        </div> --}}
        <form action="{{ route('admin.categoria_notificacao.update', ['id' => $categoria_notificacao->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.categoria_notificacaoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('categoria_notificacao.update.success'))
    <script>
        Swal.fire(
            'Categoria de Notificacão Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('categoria_notificacao.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Categoria de Notificacão!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

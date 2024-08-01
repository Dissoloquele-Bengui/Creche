{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar Notificacao</strong>
        </div> --}}
        <form action="{{ route('admin.Notificacao.update', ['id' => $Notificacao->id]) }}
" method="post">
            @csrf
            <div class="card-body">
                @include('_form.NotificacaoForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('Notificacao.update.success'))
    <script>
        Swal.fire(
            'Notificação Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Notificacao.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Notificação!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

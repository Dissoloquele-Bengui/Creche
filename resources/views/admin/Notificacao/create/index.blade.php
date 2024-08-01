
    <div class="card shadow mb-4">
        <form action="{{route('admin.Notificacao.store')}}" method="post">
            @csrf
            <div class="card-body">
                {{ $Notificacao = null }}
                @include('_form.NotificacaoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('Notificacao.create.success'))
    <script>
        Swal.fire(
            'Notificação Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Notificacao.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Notificação!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

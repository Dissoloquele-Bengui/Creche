
    <div class="card shadow mb-4">
        <form action="{{route('admin.livro.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{ $livro = null }}
                @include('_form.livroForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('livro.create.success'))
    <script>
        Swal.fire(
            'Notificação Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('livro.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Notificação!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}


    <div class="card shadow mb-4">
        <form action="{{route('admin.horario.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{ $horario = null }}
                @include('_form.horarioForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('horario.create.success'))
    <script>
        Swal.fire(
            'horário Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('horario.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar horário!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

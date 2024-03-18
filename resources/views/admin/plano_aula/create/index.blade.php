
    <div class="card shadow mb-4">
        <form action="{{route('admin.plano_aula.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{ $plano_aula = null }}
                @include('_form.plano_aulaForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>

@if (session('plano_aula.create.success'))
    <script>
        Swal.fire(
            'Plano de aula Cadastrada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('plano_aula.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Plano de aula!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

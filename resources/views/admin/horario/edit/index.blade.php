{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar horario</strong>
        </div> --}}
        <form action="{{ route('admin.horario.update', ['id' => $horario->id]) }}
" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('_form.horarioForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('horario.update.success'))
    <script>
        Swal.fire(
            'horário Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('horario.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar horário!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

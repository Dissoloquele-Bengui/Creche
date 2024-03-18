{{-- @extends('layout.admin.body')
@section('titulo','Actualizar Operador')

@section('conteudo') --}}
    <div class="card shadow mb-4">
        {{-- <div class="card-header">
        <strong class="card-title">Actualizar plano_aula</strong>
        </div> --}}
        <form action="{{ route('admin.plano_aula.update', ['id' => $plano_aula->id]) }}
" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                @include('_form.plano_aulaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>

@if (session('plano_aula.update.success'))
    <script>
        Swal.fire(
            'Plano de aula Actualizado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('plano_aula.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Plano de aula!',
            '',
            'error'
        )
    </script>
@endif

{{-- @endsection --}}

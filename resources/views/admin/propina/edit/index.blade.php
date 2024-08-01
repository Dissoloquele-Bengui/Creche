@extends('layout.admin.body')
@section('titulo','Actualizar propina')

@section('conteudo')
    <div class="mb-4 shadow card">
        <div class="card-header">
        <strong class="card-title">Actualizar propina</strong>
        </div>
        <form action="{{route('admin.propina.update',$propina->id)}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.propinaForm.index')
                <button type="submit" class="btn btn-primary w-md">Actualizar</button>
            </div>
        </form>
    </div>
@if (session('Propina.update.success'))
    <script>
        Swal.fire(
            'Propina Actualizada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Propina.update.error'))
    <script>
        Swal.fire(
            'Erro ao Actualizar Propina!',
            '',
            'error'
        )
    </script>
  @endif
@endsection

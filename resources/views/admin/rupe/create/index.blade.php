@extends('layout.admin.body')
@section('titulo','Cadastrar Rupe')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Rupe</strong>
        </div>
        <form action="{{route('admin.rupe.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.rupeForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@if (session('rupe.create.success'))
    <script>
        Swal.fire(
            'Rupe Cadastrado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('rupe.create.error'))
    <script>
        Swal.fire(
            'Erro ao Cadastrar Rupe!',
            '',
            'error'
        )
    </script>
@endif
@endsection

@extends('layout.admin.body')
@section('titulo','Cadastrar Propina')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Cadastrar Propina</strong>
        </div>
        <form action="{{route('admin.propina.pagarPropina')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form.pagamentoForm.index')
                <button type="submit" class="btn btn-primary w-md">Cadastrar</button>
            </div>
        </form>
    </div>
@endsection

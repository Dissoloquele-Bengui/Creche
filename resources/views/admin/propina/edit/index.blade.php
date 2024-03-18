@extends('layout.admin.body')
@section('titulo','Actualizar propina')

@section('conteudo')
    <div class="card shadow mb-4">
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
@endsection

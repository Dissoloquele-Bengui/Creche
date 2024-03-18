@extends('layout.admin.body')
@section('titulo','Horário')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Horário</strong>
        </div>
        <div class="card-body">

            <div class="my-4 row">
                <div class="mb-4 col-md-12">
                    <div class="shadow card">
                        <div class="card-body">
                            <img src="{{asset($horario->caminho)}}" width="100%"  height="500">
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /. col -->
            </div> <!-- end section -->
        </div>
    </div>

@endsection

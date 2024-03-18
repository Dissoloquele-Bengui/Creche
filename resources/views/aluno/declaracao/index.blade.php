@extends('layout.admin.body')
@section('titulo','Solicitação de Declaração')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
            <strong class="card-title">Solicitação de Declaração</strong>
        </div>
        <div class="card-body">

            <div class="my-4 row">
                <div class="mb-4 col-md-12">
                    <div class="shadow card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 justify-center">
                                    <a href="{{route('admin.aluno.emitirRupeDeclaracao')}}"  class="btn btn-primary w-md">Emitir um rupe para declaração sem nota</a>
                                    <a href="{{route('admin.aluno.emitirRupeDeclaracaoNota')}}"  class="btn btn-primary w-md">Emitir um rupe para declaração com nota</a>
                                    <button  class="btn btn-primary w-md" data-toggle="modal" data-target="#ModalCreate"
                                    type="button">Enviar o Comprovativo</button>
                                </div>
                            </div>
                        </div> <!-- /.card-body -->
                    </div> <!-- /.card -->
                </div> <!-- /. col -->
            </div> <!-- end section -->
        </div>
    </div>
    <div class="text-left modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ __('Enviar  Comprovativo') }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('admin.aluno.solicitaDeclaracao')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="">Código do RUPE</label>
                                        <input type="number" name="codigo" class="form-control" required >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="">Comprovativo</label>
                                        <input type="file" name="comprovativo" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="">Tipo de Declaração</label>
                                        <select name="servico_id" id="" class="form-control">
                                            <option value="3">Declaração Sem Nota</option>
                                            <option value="4">Declaração Com Nota</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-md">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@if (session('solicita.create.success'))
    <script>
        Swal.fire(
            'Solicitação enviada com sucesso! <br> Aguarde a Notificação',
            '',
            'success'
        )
    </script>
@endif
@if (session('solicita.create.error'))
    <script>
        Swal.fire(
            'Erro ao Efectuar Solicitação! <br>Certifique se de que o código está correto!',
            '',
            'error'
        )
    </script>
@endif
@endsection

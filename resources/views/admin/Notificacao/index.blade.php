@extends('layout.admin.body')
@section('titulo','Lista das Notificações')

@section('conteudo')
<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <h2 class="mb-2 page-title">Lista das Notificações</h2>

      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">

            <div class="card-body">
                <div class="ml-auto col">
                    <div class="float-right dropdown">
                      <button class="float-right ml-3 btn btn-primary"
                      class="btn botao" data-toggle="modal" data-target="#ModalCreate"
                      type="button">Adicionar +</button>
                    </div>
                </div>
                <!-- table -->
              <table class="table datatables" id="dataTable-1">
                  {{-- @can('user-create') --}}

                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Assunto</th>
                      <th>Descricao</th>
                      <th>Categória</th>
                      <th>Data</th>
                      <th>Hora</th>
                      <th>Opções</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($Notificacoes as $Notificacao)
                      <tr>
                          <td>{{$Notificacao->id}}</td>
                          <td>{{{$Notificacao->vc_assunto}}}</td>
                          <td>{{{$Notificacao->lt_descricao}}}</td>
                          <td>{{{$Notificacao->categoria}}}</td>
                          <td>{{{$Notificacao->dt_data}}}</td>
                          <td>{{{$Notificacao->tm_hora}}}</td>
                          <td>
                              <div class="dropdown">
                                  <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="text-muted sr-only">Action</span>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right">
                                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#ModalEdit{{$Notificacao->id}}">{{ __('Editar') }}</a>
                                      {{-- <a class="dropdown-item" href="{{route('admin.Notificacao.edit',['id'=>$Notificacao->id])}}">Editar</a> --}}
                                      <a class="dropdown-item" href="{{route('admin.Notificacao.destroy',['id'=>$Notificacao->id])}}">Remover</a>
                                      <a class="dropdown-item" href="{{route('admin.Notificacao.purge',['id'=>$Notificacao->id])}}">Purgar</a>
                                  </div>
                                  </div>

                          </td>
                      </tr>
                  {{-- ModalUpdate --}}
                  <div class="modal fade text-left" id="ModalEdit{{$Notificacao->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">{{ __('Editar Notificacao') }}</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  @include('admin.Notificacao.edit.index')
                                  </div>
                              </div>
                          </div>
                      </div>
                  {{-- ModalUpdate --}}
                  @endforeach
              </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid1 -->

{{-- ModalCreate --}}

        <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">{{ __('Adicionar Notificacao') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @include('admin.Notificacao.create.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

{{-- ModalCreate --}}




@if (session('Notificacao.destroy.success'))
    <script>
        Swal.fire(
            'Notificacao Eliminada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Notificacao.destroy.error'))
    <script>
        Swal.fire(
            'Erro ao Eliminar Notificacao!',
            '',
            'error'
        )
    </script>
@endif
@if (session('Notificacao.purge.success'))
    <script>
        Swal.fire(
            'Notificacao Purgada com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@if (session('Notificacao.purge.error'))
    <script>
        Swal.fire(
            'Erro ao Purgar Notificacao!',
            '',
            'error'
        )
    </script>
@endif
<script>

    function getApartamentos() {
        let id_turma = $('#it_id_turma').val().length<1 ?["All"] : $('#it_id_turma').val();
        let id_andar = $('#it_id_andar').val().length<1 ? ["All"] : $('#it_id_andar').val();
        console.log(id_turma);
        $.ajax({
            url: "{{ route('admin.notificacao.getApartamento') }}",
            type: "GET",
            data: {
                it_id_turma: id_turma,
                it_id_andar: id_andar
            },
            success: function (result) {
                console.log(result);

                // Limpa as opções existentes
                $('#it_id_apartamento').html('');

                // Adiciona as opções dinamicamente
                $.each(result.apartamentos, function (index, option) {
                    let optionHtml = "<option value='" + option['id'] + "'>" + option['vc_nome'] + "</option>";
                    $('#it_id_apartamento').append(optionHtml);
                });

                // Atualiza o Select2
                $('#it_id_apartamento').select2({
                    // Opções adicionais do Select2, se necessário
                });

            },
            error: function (xhr, status, error) {
                console.error("Erro na requisição Ajax: " + status + " - " + error);
            }
        });
    }


    function getApartamentosUpdate(id) {
        let it_id_turma = $('#it_id_turma'+id).val();
        let it_id_andar = $('#it_id_andar'+id).val();

        $('#it_id_apartamento'+id+' option').filter(function() {
            let turma = $(this).data('it_id_turma');
            let andar = $(this).data('it_id_andar');

            if ((it_id_turma == "All" || turma == it_id_turma) &&
                (it_id_andar == "All" || andar == it_id_andar)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }

</script>
@endsection

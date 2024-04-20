<!doctype html>
<html lang="pt-br">
@include('layout.admin.head')
<body class="vertical light ">
    <div class="wrapper">
        @if (!isset($login))
            @if (Auth::user()->tipo == "Encarregado")
                @include('layout.admin.menu2')
            @else
                @include('layout.admin.menu')
            @endif
        @else
            @yield('conteudo')
        @endif
        <main role="main" class="main-content">
            @if (!isset($login))
                @yield('conteudo')
            @endif
            <div class="modal fade modal-right-notificacoes-ap modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm" style="min-width: 40%!important;" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Quadro de Notificações</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="bg-white modal-body">
                        <div class="mt-1 mb-4 col-md-12" id="quadro-notificacoes">


                            <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">

                                    @foreach (minhasNotificacoes()['notificacoes'] as $notificacao)

                                        <a class="text-justify row align-items-center btn" onclick="getNotificacao({{$notificacao->id_estado}})">
                                            <div class="col-auto">
                                                <span class="circle circle-sm bg-warning"><i class="text-white fe fe-shield-off fe-16"></i>

                                                </span>
                                            </div>
                                            <div class="col">
                                                <small><strong>{{formatarDataPortugues($notificacao->created_at)}}</strong></small>
                                                <div class="mb-2 text-muted small">{{$notificacao->lt_descricao}} </div>
                                                <span class="badge badge-pill badge-warning">{{$notificacao->categoria}}</span>
                                            </div>
                                            <div class="col-auto pr-0">
                                                <small class="fe fe-more-vertical fe-16 text-muted"></small>
                                            </div>
                                        </a> <!-- / .row -->
                                    @endforeach


                            </div>

                            </div> <!-- / .list-group -->
                        </div>

                    </div>
                    <div class="bg-white modal-footer">
                        <button type="button" class="mb-2 btn btn-secondary" data-dismiss="modal">Fechar</button>

                    </div>
                    </div>
                </div>
            </div>
            <div class="text-left modal fade" id="ModalNotificacao" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="notificacao-title"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="title" id="notificacao-assunto"></h4>
                            <p class="mt-4 text-justify" id="notificacao-descricao">
                            </p>
                            <h5 id="notificacao-data" > </h5>
                        </div>
                    </div>
                </div>
            </div>

        </main>

    </div> <!-- .wrapper -->
    <script src="{{ asset('painel/js/jquery.min.js') }}"></script>
    <script src="{{ asset('painel/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('painel/js/popper.min.js') }}"></script>
    <script src="{{ asset('painel/js/moment.min.js') }}"></script>
    <script src="{{ asset('painel/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('painel/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('painel/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('painel/js/jquery.stickOnScroll.js') }}"></script>
    <script src="{{ asset('painel/js/tinycolor-min.js') }}"></script>
    <script src="{{ asset('painel/js/config.js') }}"></script>
    <script src="{{ asset('painel/js/d3.min.js') }}"></script>
    <script src="{{ asset('painel/js/topojson.min.js') }}"></script>
    <script src="{{ asset('painel/js/datamaps.all.min.js') }}"></script>
    <script src="{{ asset('painel/js/datamaps-zoomto.js') }}"></script>
    <script src="{{ asset('painel/js/datamaps.custom.js') }}"></script>
    <script src="{{ asset('painel/js/Chart.min.js') }}"></script>
    <script src="{{ asset('painel/js/jsdeliver.js') }}"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>-->

    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>-->
    <script src="{{ asset('painel/js/jsdeliver.js') }}"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script>
        Chart.defaults.global.defaultFontFamily = base.defaultFontFamily;
        Chart.defaults.global.defaultFontColor = colors.mutedColor;
    </script>
    <script src="{{ asset('painel/js/gauge.min.js') }}"></script>
    <script src="{{ asset('painel/js/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('painel/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('painel/js/apexcharts.custom.js') }}"></script>
    <script src="{{ asset('painel/js/apps.js') }}"></script>
    <!--Select2-->
    <script src="{{ asset('painel/js/select2.min.js') }}"></script>

    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    -->
    <script src="painel/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="painel/js/googleManager.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-56159088-1');
    </script>
    <script src="{{ asset('painel/js/select2.min.js') }}"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
            function formatarDataLaravelParaPortugues(dataLaravel) {
                // Converte a string de data do Laravel para um objeto Date
                const data = new Date(dataLaravel);

                // Obtém o dia, mês e ano
                const dia = data.getDate();
                const mes = data.getMonth() + 1; // Lembrando que os meses em JavaScript começam do zero
                const ano = data.getFullYear();

                // Formata a data no padrão português
                const dataFormatada = `${dia}/${mes}/${ano}`;

                return dataFormatada;
            }

        $('select.form-control').select2();
        function getNotificacao(id_estado){

            $.ajax({
            url: "{{ route('admin.notificacao.vizualize') }}",
            type: "GET",
            data: {
                id: id_estado
            },
            success: function (result) {
                console.log(result)
                $('.modal-right-notificacoes-ap').modal('hide');
                $('#notificacao-title').html('');
                $('#notificacao-assunto').html('');
                $('#notificacao-descricao').html('');
                $('#notificacao-data').html('');
                $('#notificacao-title').append(result.notificacoes['categoria']);
                $('#notificacao-assunto').append("Assunto: "+result.notificacoes['vc_assunto']);

                $('#form_voto').hide();
                $('#notificacao-descricao').append(result.notificacoes['lt_descricao']);
                $('#notificacao-data').append("Aos "+formatarDataLaravelParaPortugues(result.notificacoes['created_at']));
                $('#ModalNotificacao').modal('show');
                let total = $('#count-view').text();
                //alert(total);
                $('#count-view').html();
                if(total-1 ==0){
                    $('#count-view').hide();
                }else{
                    $('#count-view').append((total-1))
                }

            },
            error: function (xhr, status, error) {
                console.error("Erro na requisição Ajax: " + status + " - " + error);
            }
            });
        }

    </script>
     <script>
        function getDisciplinaByTurma(){
            let option = $('#it_id_turma').val();
            $('#it_id_disciplina').html('');
            if(!option ==0){
                $.ajax({
                    type:"GET",
                    url:"{{route('admin.avaliacao.getDisciplinaByTurma')}}",
                    data:{id:option},
                    success: function(result){
                        console.log(result);
                        $.each(result, function(index, item){
                            console.log(item);
                            let option = `<option value="`+item['id']+`" > `+item['nome']+`</option>`;
                            $('#it_id_disciplina').append(option);
                        });
                        $('#it_id_disciplina').select2();
                    },
                    error: function(error){

                    }
                });
            }
        }
    </script>
</body>

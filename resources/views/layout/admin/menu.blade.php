
<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
      <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Digite Alguma Coisa..." aria-label="Procurar">
    </form>
    <ul class="nav">
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
          <span class="fe fe-grid fe-16"></span>
        </a>
      </li>
      <li class="nav-item nav-notif">
        <a class="my-2 nav-link text-muted position-relative" href="./#" data-toggle="modal" data-target=".modal-right-notificacoes-ap">
            <span class="fe fe-bell fe-16"></span>
            <span class="dot dot-md bg-success"></span>
             @if (minhasNotificacoes()['not_view']>0 )
                <span class="badge badge-danger badge-counter" id="count-view">{{ minhasNotificacoes()['not_view']>100?'99+':minhasNotificacoes()['not_view'] }}</span>
            @endif
        </a>
    </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="avatar avatar-sm mt-2">
            <img src="" alt="..." class="avatar-img rounded-circle">
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <li class="nav-item">
                <a class="nav-link pl-3 btn " href="/">Voltar para o site</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" class="form-control btn text-center" onclick="event.preventDefault();
                        this.closest('form').submit();">Terminar Sessão</a>
                </form>
            </li>
        </ul>


      </li>
    </ul>
    </nav>
<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./{{route('home')}}">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        @if (Auth::user()->tipo == "Administrador")
        <li class="nav-item dropdown">
            <a href="/"  class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
            </a>

        </li>
        @endif

        @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo=="DP"||Auth::user()->tipo=="Prestador de Serviços")
        <li class="nav-item dropdown">
            <a href="{{route('admin.user.index')}}"  class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i> <!-- Ícone de "usuário" para "Aluno" -->
                <span class="ml-3 item-text">Usuário</span><span class="sr-only">(current)</span>
            </a>
        </li>
        @endif
        @if(Auth::user()->tipo=="Administrador" || Auth::user()->tipo=="DP")
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Area Pedagógica</span>
            </p>
            <li class="nav-item dropdown">
                <a href="#aluno-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i> <!-- Ícone de "usuário" para "Aluno" -->
                    <span class="ml-3 item-text">Aluno</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="aluno-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.aluno.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.aluno.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#professor-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-check fe-16"></i> <!-- Ícone de "verificação de usuário" para "Professor" -->
                    <span class="ml-3 item-text">Professor</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="professor-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.professor.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.professor.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#curso-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-book-open fe-16"></i> <!-- Ícone de "livro aberto" para "Curso" -->
                    <span class="ml-3 item-text">Curso</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="curso-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.curso.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.curso.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#classe-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i> <!-- Ícone de "grade" para "Classe" -->
                    <span class="ml-3 item-text">Classe</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="classe-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.classe.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.classe.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#turma-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i> <!-- Ícone de "usuários" para "Turma" -->
                    <span class="ml-3 item-text">Turma</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="turma-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.turma.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.turma.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#disciplina-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-bookmark fe-16"></i> <!-- Ícone de "marcação" para "Disciplina" -->
                    <span class="ml-3 item-text">Disciplina</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="disciplina-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.disciplina.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.disciplina.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#matricula-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-clipboard fe-16"></i> <!-- Ícone de "prancheta" para "Matriculas" -->
                    <span class="ml-3 item-text">Matriculas</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="matricula-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.matricula.create') }}"><span class="ml-1 item-text">Matricular</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.matricula.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#ano-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Ano Lectivo</span><span class="sr-only">(current)</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ano-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.ano.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('admin.ano.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.horario.index') }}" class="nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Horário</span><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.plano_aula.index') }}" class="nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Plano de Aula</span><span class="sr-only">(current)</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->tipo=="Administrador"|| Auth::user()->tipo=="DP" ||Auth::user()->tipo=="Professor")
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Notas</span>
            </p>
            <li class="nav-item ">
                <a class="nav-link pl-3" href="{{ route('admin.avaliacao.prova') }}"><span class="ml-1 item-text">Lançar Notas</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link pl-3" href="{{ route('admin.avaliacao.verProva') }}"><span class="ml-1 item-text">Consultar Notas</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link pl-3" href="{{ route('admin.avaliacao.consultarNotaTurma') }}"><span class="ml-1 item-text">Consultar Notas Da Turma</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link pl-3" href="{{ route('admin.avaliacao.avaliar') }}"><span class="ml-1 item-text">Avaliações continuas</span></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link pl-3" href="{{ route('admin.avaliacao.verAvaliacao') }}"><span class="ml-1 item-text">Consultar Avaliações</span></a>
            </li>
        @endif
        @if (Auth::user()->tipo=="Administrador"|| Auth::user()->tipo=="DP" ||Auth::user()->tipo=="Professor")
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Notificações</span>
        </p>
        @if (Auth::user()->tipo!="Professor")
            <li class="nav-item dropdown">
                <a class="nav-link pl-3" href="{{ route('admin.categoria_notificacao.index') }}">
                    <i class="fe fe-folder fe-16"></i>
                    <span class="ml-1 item-text">Categória</span>
                </a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <li class="nav-item">
                    <a class="nav-link pl-3" href="{{ route('admin.Notificacao.index') }}">
                        <i class="fe fe-bell fe-16"></i>
                        <span class="ml-1 item-text">Notificação</span>
                    </a>
                </li>
            </li>
        @endif


       {{-- <li class="nav-item dropdown">
            <a href="#frequencia-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-check-circle fe-16"></i> <!-- Ícone de "marca de seleção" para "Frequencias" -->
                <span class="ml-3 item-text">Frequencias</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="frequencia-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.frequencia.presenca') }}"><span class="ml-1 item-text">Registrar presença</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.frequencia.index') }}"><span class="ml-1 item-text">Consultar lista de presença</span></a>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#falta-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-alert-triangle fe-16"></i> <!-- Ícone de "triângulo de alerta" para "Falta" -->
                <span class="ml-3 item-text">Falta</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="falta-collapse">
                <li class="nav-item active">
                    <a class="nav-link pl-3" href="{{ route('admin.falta.justificar') }}"><span class="ml-1 item-text">Justificar Faltas</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a href="#verfalta-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <span class="ml-3 item-text">Ver Falta</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="verfalta-collapse">
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ route('admin.falta.verTurmaFalta') }}"><span class="ml-1 item-text">Turma</span></a>
                        </li>
                        <li>
                            <a class="nav-link pl-3" href="{{ route('admin.falta.verAlunoFalta') }}"><span class="ml-1 item-text">Aluno</span></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        <li class="nav-item dropdown">
            <a href="#propina-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-dollar-sign fe-16"></i> <!-- Ícone de "cifra de dólar" para "Propina" -->
                <span class="ml-3 item-text">Propina</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="propina-collapse">
                <ul class="collapse list-unstyled pl-4 w-100" id="propina-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.propina.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.propina.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </ul>
        </li>
       --}}
        @if (Auth::user()->tipo=="Administrador")
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>
                Actividades
            </span>
        </p>
        <li class="nav-item dropdown">
            <a href="#logs-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-file-text fe-16"></i> <!-- Ícone de "documento de texto" para "Logs do Sistema" -->
                <span class="ml-3 item-text">Logs do Sistema</span><span class="sr-only">(current)</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="logs-collapse">
                <ul class="collapse list-unstyled pl-4 w-100" id="logs-collapse">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('admin.logs.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </ul>

        </li>
        @endif
        @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo=="Bibliotecario")
            <p class="text-muted nav-heading mt-4 mb-1">
                <span>Biblíoteca</span>
            </p>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.categoria_livro.index') }}"  class=" nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Categória de Livros</span><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{ route('admin.livro.index') }}"  class=" nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Livro</span><span class="sr-only">(current)</span>
                </a>
            </li>
        @endif
        @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo=="Prestador de Serviços"||Auth::user()->tipo=="Secretário")
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Prestação de Serviços</span>
        </p>
            @if (Auth::user()->tipo=="Secretário" ||Auth::user()->tipo=="Administrador")
                <li class="nav-item dropdown">
                    <a href="#projeto-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Projeto</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="projeto-collapse">
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ route('admin.projeto.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.projeto.index') }}"><span class="ml-1 item-text">Listar</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#servico-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Serviço</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="servico-collapse">
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ route('admin.servico.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.servico.index') }}"><span class="ml-1 item-text">Listar</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#rupe-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Rupe</span><span class="sr-only">(current)</span>
                    </a>
                    <ul class="collapse list-unstyled pl-4 w-100" id="rupe-collapse">
                        <li class="nav-item active">
                            <a class="nav-link pl-3" href="{{ route('admin.rupe.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-3" href="{{ route('admin.rupe.index') }}"><span class="ml-1 item-text">Listar</span></a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.solicitacaoServico.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Solicitação de Serviços</span><span class="sr-only">(current)</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->tipo == "Prestador de Serviços")
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.loja.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Loja</span><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.produto.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Produto</span><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.cheque.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Cheque</span><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.pagamento_fatura.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Pagamentos</span><span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="{{ route('admin.vendas.index') }}"  class=" nav-link">
                        <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                        <span class="ml-3 item-text">Vendas</span><span class="sr-only">(current)</span>
                    </a>
                </li>
            @endif
        @endif

    </ul>




    </nav>
  </aside>

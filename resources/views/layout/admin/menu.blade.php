
<nav class="topnav navbar navbar-light">
    <button type="button" class="p-0 mt-2 mr-3 navbar-toggler text-muted collapseSidebar">
      <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="mr-auto form-inline searchform text-muted">
      <input class="pl-4 bg-transparent border-0 form-control mr-sm-2 text-muted" type="search" placeholder="Digite Alguma Coisa..." aria-label="Procurar">
    </form>
    <ul class="nav">
      <li class="nav-item">
        <a class="my-2 nav-link text-muted" href="#" id="modeSwitcher" data-mode="light">
          <i class="fe fe-sun fe-16"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="my-2 nav-link text-muted" href="./#" data-toggle="modal" data-target=".modal-shortcut">
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
        <a class="pr-0 nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mt-2 avatar avatar-sm">
            <img src="" alt="..." class="avatar-img rounded-circle">
          </span>
        </a>
        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <li class="nav-item">
                <a class="pl-3 nav-link btn " href="/">Voltar para o site</a>
            </li>
            <li class="nav-item">
                <form action="/logout" method="POST">
                    @csrf
                    <a href="/logout" class="text-center form-control btn" onclick="event.preventDefault();
                        this.closest('form').submit();">Terminar Sessão</a>
                </form>
            </li>
        </ul>


      </li>
    </ul>
    </nav>
<aside class="bg-white shadow sidebar-left border-right" id="leftSidebar" data-simplebar>
    <a href="#" class="mt-3 ml-2 btn collapseSidebar toggle-btn d-lg-none text-muted" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="mb-4 w-100 d-flex">
        <a class="mx-auto mt-2 text-center navbar-brand flex-fill" href="./{{route('home')}}">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="mb-2 navbar-nav flex-fill w-100">
        @if (Auth::user()->tipo == "Administrador")
        <li class="nav-item dropdown">
            <a href="/admin/painel"  class=" nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
            </a>

        </li>
        @endif

        @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo=="DP"||Auth::user()->tipo=="Prestador de Serviços")
            <li class="nav-item dropdown">
                <a href="{{route('admin.user.index')}}"  class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i> <!-- Ícone de "usuário" para "Criança" -->
                    <span class="ml-3 item-text">Usuário</span><span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a href="{{route('admin.encarregado.index')}}"  class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i> <!-- Ícone de "usuário" para "Criança" -->
                    <span class="ml-3 item-text">Encarregados</span><span class="sr-only">(current)</span>
                </a>
            </li>
        @endif
        @if(Auth::user()->tipo=="Administrador" || Auth::user()->tipo=="DP")
            <p class="mt-4 mb-1 text-muted nav-heading">
                <span>Area Pedagógica</span>
            </p>
            <li class="nav-item dropdown">
                <a href="#aluno-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i> <!-- Ícone de "usuário" para "Criança" -->
                    <span class="ml-3 item-text">Criança</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="aluno-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.aluno.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.aluno.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#professor-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user-check fe-16"></i> <!-- Ícone de "verificação de usuário" para "Educador" -->
                    <span class="ml-3 item-text">Educador</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="professor-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.professor.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.professor.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#classe-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i> <!-- Ícone de "grade" para "Classe" -->
                    <span class="ml-3 item-text">Ano</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="classe-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.classe.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.classe.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#turma-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i> <!-- Ícone de "usuários" para "Turma" -->
                    <span class="ml-3 item-text">Turma</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="turma-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.turma.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.turma.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>


            <li class="nav-item dropdown">
                <a href="#matricula-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-clipboard fe-16"></i> <!-- Ícone de "prancheta" para "Matriculas" -->
                    <span class="ml-3 item-text">Matriculas</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="matricula-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.matricula.create') }}"><span class="ml-1 item-text">Matricular</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.matricula.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a href="#ano-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-calendar fe-16"></i> <!-- Ícone de "calendário" para "Ano Lectivo" -->
                    <span class="ml-3 item-text">Ano Lectivo</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="ano-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.ano.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="pl-3 nav-link" href="{{ route('admin.ano.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->tipo=="Administrador"|| Auth::user()->tipo=="DP" ||Auth::user()->tipo=="Educador")
        <p class="mt-4 mb-1 text-muted nav-heading">
            <span>Notificações</span>
        </p>
        @if (Auth::user()->tipo!="Educador")
            <li class="nav-item dropdown">
                <a class="pl-3 nav-link" href="{{ route('admin.categoria_notificacao.index') }}">
                    <i class="fe fe-folder fe-16"></i>
                    <span class="ml-1 item-text">Categória</span>
                </a>
            </li>
            @endif
            <li class="nav-item dropdown">
                <li class="nav-item">
                    <a class="pl-3 nav-link" href="{{ route('admin.Notificacao.index') }}">
                        <i class="fe fe-bell fe-16"></i>
                        <span class="ml-1 item-text">Notificação</span>
                    </a>
                </li>
            </li>
        @endif


        <li class="nav-item dropdown">
            <a href="#frequencia-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-check-circle fe-16"></i> <!-- Ícone de "marca de seleção" para "Frequencias" -->
                <span class="ml-3 item-text">Frequencias</span><span class="sr-only">(current)</span>
            </a>
            <ul class="pl-4 collapse list-unstyled w-100" id="frequencia-collapse">
                <li class="nav-item active">
                    <a class="pl-3 nav-link" href="{{ route('admin.frequencia.presenca') }}"><span class="ml-1 item-text">Registrar presença</span></a>
                </li>
                <li class="nav-item active">
                    <a class="pl-3 nav-link" href="{{ route('admin.frequencia.index') }}"><span class="ml-1 item-text">Consultar lista de presença</span></a>
                </li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a href="#propina-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-dollar-sign fe-16"></i> <!-- Ícone de "cifra de dólar" para "Propina" -->
                <span class="ml-3 item-text">Propina</span><span class="sr-only">(current)</span>
            </a>
            <ul class="pl-4 collapse list-unstyled w-100" id="propina-collapse">
                <ul class="pl-4 collapse list-unstyled w-100" id="propina-collapse">
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.propina.create') }}"><span class="ml-1 item-text">Cadastrar</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="pl-3 nav-link" href="{{ route('admin.propina.index') }}"><span class="ml-1 item-text">Listar</span></a>
                    </li>
                </ul>
            </ul>
        </li>
        @if (Auth::user()->tipo=="Administrador")
            <p class="mt-4 mb-1 text-muted nav-heading">
                <span>
                    Actividades
                </span>
            </p>
            <li class="nav-item dropdown">
                <a href="#logs-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-file-text fe-16"></i> <!-- Ícone de "documento de texto" para "Logs do Sistema" -->
                    <span class="ml-3 item-text">Logs do Sistema</span><span class="sr-only">(current)</span>
                </a>
                <ul class="pl-4 collapse list-unstyled w-100" id="logs-collapse">
                    <ul class="pl-4 collapse list-unstyled w-100" id="logs-collapse">
                        <li class="nav-item active">
                            <a class="pl-3 nav-link" href="{{ route('admin.logs.index') }}"><span class="ml-1 item-text">Listar</span></a>
                        </li>
                    </ul>
                </ul>

            </li>
        @endif


    </ul>




    </nav>
  </aside>

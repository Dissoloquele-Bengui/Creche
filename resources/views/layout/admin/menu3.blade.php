
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



        @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo=="Prestador de Serviços"||Auth::user()->tipo=="Secretário")
        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Prestação de Serviços</span>
        </p>
            @if (Auth::user()->tipo=="Administrador"||Auth::user()->tipo == "Prestador de Serviços")
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

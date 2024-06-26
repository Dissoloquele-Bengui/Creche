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
        <li class="nav-item">
            <a href="/" class="nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">SITE</span><span class="sr-only">(current)</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('admin.encarregado.index')}}" class="nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Encarregados</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.aluno.index') }}" class="nav-link">
                <i class="fe fe-users fe-16"></i>
                <span class="ml-3 item-text">Crianças</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.frequencia.index') }}" class="nav-link">
                <i class="fe fe-check-circle fe-16"></i>
                <span class="ml-3 item-text">Ver Frequências</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.propina.index') }}" class="nav-link">
                <i class="fe fe-dollar-sign fe-16"></i>
                <span class="ml-3 item-text">Listar Propinas</span>
            </a>
        </li>
      </ul>
    </nav>
</aside>

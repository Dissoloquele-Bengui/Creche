  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="{{route('home')}}" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Nagefa<span>.</span></h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}" class="active">Página Inicial</a></li>
          <li><a href="{{route('sobre')}}">Sobre</a></li>

          <li class="dropdown"><a href="#"><span>Procedimentos</span> <i
                class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li class="dropdown">
                <a href="{{route('inscricao')}}"><span>Inscrição</span></a>

              </li>
            </ul>
          </li>
          @if (Auth::check())
                    <li><a href="/admin/painel">Sistema</a>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                            this.closest('form').submit();">Terminar Sessão</a>
                        </form>
                    </li>
            @else
                <li class="dropdown"><a href="#"><span>Login</span> <i
                  class="bi bi-chevron-down dropdown-indicator"></i></a>
                  <ul>
                    <li class="dropdown"><a href="{{route('login')}}">Via E-mail</a></li>

                    </li>
                  </ul>
                </li>

            @endif
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

@include('layout.site.head')
<body>

    @include('layout.site.menu')

    @yield('hero')

    <main id="main">

        @yield('conteudo')

    </main><!-- End #main -->


    	<!-- jquery -->
        <script src="{{asset('site/assets/js/jquery-1.11.3.min.js')}}"></script>
        <!-- bootstrap -->
    
        <script src="{{asset('site2/assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <!-- count down -->
        <script src="{{asset('site2/assets/js/jquery.countdown.js')}}"></script>
        <!-- isotope -->
        <script src="{{asset('site2/assets/js/jquery.isotope-3.0.6.min.js')}}"></script>
        <!-- waypoints -->
        <script src="{{asset('site2/assets/js/waypoints.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('site2/assets/js/owl.carousel.min.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('site2/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <!-- mean menu -->
        <script src="{{asset('site2/assets/js/jquery.meanmenu.min.js')}}"></script>
        <!-- sticker js -->
        <script src="{{asset('site2/assets/js/sticker.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('site2/assets/js/main.js')}}"></script>
    
    @include('layout.site.footer')
    <script>
        $('select.form-control').select2();
    </script>
  </body>

  </html>

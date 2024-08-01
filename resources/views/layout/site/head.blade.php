<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nagefa-  @yield("- ".'titulo')</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="{{asset('site/https://fonts.googleapis.com')}}">
  <link rel="preconnect" href="{{asset('site/https://fonts.gstatic.com')}}" crossorigin>
  <link
    href="{{asset('site/https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Work+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap')}}"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('site/assets/css/main.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('site/assets/css/all.min.css')}}">
  <!-- bootstrap -->
    @if (isLoja())
    <link rel="stylesheet" href="{{ asset('site2/assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/owl.carousel.css')}}">
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/magnific-popup.css')}}">
    <!-- animate css -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/animate.css')}}">
    <!-- mean menu css -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/meanmenu.min.css')}}">
    <!-- main style -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/main.css')}}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('site2/assets/css/responsive.css')}}">

    @endif
  <script src="{{asset('painel/js/jquery.min.js')}}"></script>
  <script src="{{ asset('painel/js/sweetalert2.all.min.js') }}"></script>
</head>

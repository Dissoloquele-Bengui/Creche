
@extends('layout.site.body')
@section('titulo',"Página Inicial")
@section('hero')

@endsection
@section('conteudo')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/breadcrumbs-bg.jpg')}});">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>Lojas</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Lojas</li>
          </ol>

        </div>
    </div><!-- End Breadcrumbs -->
    <!-- ======= Stats Counter Section ======= -->
    <section id="stats-counter" class="stats-counter section-bg">
        <div class="container">

          <div class="row gy-4">

            @foreach ($lojas as $loja)
                    <div style="margin:0 auto;padding:0  30px" class="justify-center{{count($lojas)<3?'col-lg-6':'col-lg-4'}} col-md-6 {{$loja->id_loja}}">
                        <div class="single-product-item" style="margin:0 auto;text-align:center">
                            <div class="product-image" style="margin:0 auto">
                                <a href="{{route('loja.site.loja',['id'=>$loja->id])}}">
                                    <img height="300px" width="100%" src="{{asset($loja->vc_imagem)}}" alt="">
                                </a>
                            </div>
                            <h3 style="margin:0 auto">{{$loja->nome}}</h3>
                            <a style="margin:0 auto" href="{{route('loja.site.loja',['id'=>$loja->id])}}" class="cart-btn addProdutoToCarrinho" data-id="{{$loja->id}}"><i class="fas fa-shopping-cart"></i> Ver Mais</a>
                        </div>
                    </div>
                @endforeach

          </div>

        </div>
      </section><!-- End Stats Counter Section -->
      
    	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">


			<div class="row product-lists text-center mx-auto">
                
            </div>
            

			
		</div>
	</div>
	<!-- end products -->





@endsection

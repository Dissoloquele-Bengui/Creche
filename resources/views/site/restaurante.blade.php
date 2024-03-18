
@extends("layout.site.body")
@section("titulo","Restaurantes")

@section("conteudo")
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="breadcrumb-text">
						<p>Explore a nossa coleção de produtos</p>
						<h1>Compre!</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">



			<div class="row product-lists">
                @foreach ($produtos as $produtos)
                    <div class="col-lg-4 col-md-6 text-center {{$produtos->id_loja}}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{route('loja.site.produtos',['id'=>$produtos->id])}}">
                                    <img height="300px" width="100%" src="{{asset($produtos->imagem)}}" alt="">
                                </a>
                            </div>
                            <h3>{{$produtos->nome}}</h3>
                            <p class="product-price"><span>Por Produto</span> {{$produtos->preco}} Kzs</p>
                            <a href="{{route('loja.site.addProdutoCart',['id'=>$produtos->id])}}" class="cart-btn addProdutoToCarrinho" data-id="{{$produtos->id}}"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                        </div>
                    </div>
                @endforeach
			</div>

		</div>
	</div>
	<!-- end products -->

    <div class="container justify-center ">
        <div class="contact-form col-md-8" style="margin: 10px auto !important">
            <form method="POST" action="{{route('loja.site.comentarios')}}">
                @csrf
                <p><textarea name="message" id="message" cols="20" rows="10" placeholder="Message"></textarea></p>
                <input type="hidden" name="id_loja" value="{{$loja->id}}">
                <p><input type="submit" value="Comentar"></p>
            </form>
        </div>
    </div>
    	<!-- testimonail-section -->
	<div class="testimonail-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="testimonial-sliders">
                        @foreach ($comentarios as $comentario)
                            <div class="single-testimonial-slider">
                                <div class="client-avater">
                                    @if(isset($comentario->profile_photo_path))
                                        <img src="{{asset($comentario->profile_photo_path)}}" alt="">
                                    @endif
                                </div>
                                <div class="client-meta">
                                    <h3>{{$comentario->name}} <span>Local shop owner</span></h3>
                                    <p class="testimonial-body">
                                        " {{$comentario->mensagem}} "
                                    </p>
                                    <div class="last-icon">
                                        <i class="fas fa-quote-right"></i>
                                    </div>
                                </div>
                            </div>

                        @endforeach

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end testimonail-section -->
@endsection


@extends("layout.site.body")
@section("titulo","Lista de Livros")

@section("conteudo")
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="breadcrumb-text">
						<p>Explore a nossa coleção de Livros</p>
						<h1>Leia!</h1>
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
                @foreach (getLivros() as $livro)
                    <div class="col-lg-4 col-md-6 text-center {{$livro->id_loja}}">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{asset($livro->ficheiro)}}" target="_blank" download="{{$livro->titulo}}">
                                    <img height="300px" width="100%" src="{{asset($livro->imagem)}}" alt="">
                                </a>
                            </div>
                            <p class="product-price"><span>Titulo:</span> {{$livro->titulo}} </p>
                        </div>
                    </div>
                @endforeach
			</div>

		</div>
	</div>
	<!-- end products -->

@endsection

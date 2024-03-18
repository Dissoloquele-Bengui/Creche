@extends("layout.site.body")
@section("titulo","Detalhes do Produto")

@section("conteudo")
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="breadcrumb-text">
						<p>Ver Detalhes</p>
						<h1>{{$produto->nome}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-md-5">
					<div class="single-product-img">
						<img height="400px" src="{{asset($produto->imagem)}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$produto->nome}}</h3>
						<p class="single-product-pricing"><span>Preço</span>{{$produto->preco}} Kzs</p>
						<p>{{$produto->descricao}}</p>
                        
						<div class="single-product-form">
							<a href="{{route('loja.site.addProdutoCart',['id'=>$produto->id])}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho!</a>

						</div>
						<h4>Avaliação</h4>
						<ul class="product-share" id="avaliacao">
							@for ($indice = 0; $indice < 5; $indice++)
                                @if (($media - $indice) >= 1)
                                    <li class='star' onclick='avaliar(this)' data-id='{{$produto->id}}' data-value="{{$indice+1}}"><a href='#'><i class='fas fa-star avaliar'></i></a></li>

                                @elseif (($media - $indice) > 0)
                                    <li class='star' onclick='avaliar(this)' data-id='{{$produto->id}}' data-value="{{$indice+1}}"><a href='#'><i class='fas fa-star-half-alt avaliar'></i></a></li>
                                @else
                                    <li class='star' onclick='avaliar(this)' data-id='{{$produto->id}}' data-value="{{$indice+1}}"><a href='#'><i class='far fa-star avaliar'></i></a></li>
                                @endif
                            @endfor
							{{--<li><a href=""><i class="fas fa-star-half-alt avaliar"></i></a></li>nb b
							<li><a href=""><i class="far fa-star avaliar"></i></a></li>--}}
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end single product -->

	<!-- more products -->
	<div class="more-products mb-150">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="section-title">
						<h3><span class="orange-text">Produtos</span> Relacionados</h3>
					</div>
				</div>
			</div>
			<div class="row">
                @foreach ($produtos as $produtos)
                    <div class="text-center col-lg-4 col-md-6">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single-product.html"><img height="300px" width="100%" src="{{asset($produtos->imagem)}}" alt=""></a>
                            </div>
                            <h3>{{$produtos->nome}}</h3>
                            <p class="product-price"><span>Por Produto</span> {{$produtos->preco}} Kzs</p>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Adicionar ao Carrinho</a>
                        </div>
                    </div>
                @endforeach
			</div>
		</div>
	</div>
	<!-- end more products -->
    <script>
         function avaliar(li){//Função para avaliar um produtos usando ajax e jquery
            let id_produtos = $(li).data('id');
            let valor = $(li).data('value');
            $.ajax({
                url: "{{ route('loja.site.avaliarProduto') }}",
                type: "GET",
                data: {
                    valor: valor,
                    id: id_produtos
                },
                success: function (result) {
                   // Limpe o conteúdo antes de adicionar novas estrelas
                    $('#avaliacao').html('');

                    // Adicione as estrelas ao elemento com o ID 'avaliacao'
                    for (indice = 0; indice < 5; indice++) {
                        if ((result - indice) >= 1) {
                            $('#avaliacao').append("<li class='star' onclick='avaliar(this)' data-id='{{$produtos->id}}' data-value='" + (indice+1) + "'><a href='#'><i class='fas fa-star avaliar'></i></a></li>");

                        } else if ((result - indice) > 0) {
                            $('#avaliacao').append("<li class='star' onclick='avaliar(this)' data-id='{{$produtos->id}}' data-value='" + (indice+1) + "'><a href='#'><i class='fas fa-star-half-alt avaliar'></i></a></li>");

                        } else {
                            $('#avaliacao').append("<li class='star' onclick='avaliar(this)' data-id='{{$produtos->id}}' data-value='" + (indice+1) + "'><a href='#'><i class='far fa-star avaliar'></i></a></li>");

                        }
                    }


                },
                error: function (xhr, status, error) {
                    console.error("Erro na requisição Ajax: " + status + " - " + error);
                }
            });
        }
    </script>
@endsection

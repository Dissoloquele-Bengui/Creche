@extends("layout.site.body")
@section("titulo","Meu Carrinho")

@section("conteudo")

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Imagem</th>
									<th class="product-name">Nome</th>
									<th class="product-price">Preço</th>
									<th class="product-quantity">Quantidade</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
                                <form action="{{route('loja.site.updateCarrinho')}}" method="POST" id="form_tabuleiro">
                                    @csrf
                                    @foreach ($produtos as $produtos)                                   
                                        <tr class="table-body-row">
                                            <td class="product-remove"><a href="{{route('loja.site.removeProdutoCart',['id'=>$produtos->id])}}"><i class="far fa-window-close"></i></a></td>
                                            <td class="product-image"><img src="{{asset($produtos->imagem)}}" alt=""></td>
                                            <td class="product-name">{{$produtos->nome}}</td>
                                            <td class="product-price">{{$produtos->preco}} </td>
                                            <td class="product-quantity"><input type="number" name="product[{{$produtos->id_tabuleiro}}]" placeholder="0" value="{{$produtos->quantidade}}"></td>
                                            <td class="product-total">{{$produtos->quantidade*$produtos->preco}}</td>
                                        </tr>
                                    @endforeach
                                </form>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Preço

                                    </th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>{{$total}} kzs</td>
								</tr>
								<tr class="total-data">
									<td><strong>Valor de Transporte: </strong></td>
									<td>1500 kzs </td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>{{$total + 1500}} kzs</td>
								</tr>
							</tbody>
						</table>
                        

                        <div class="row">
                            <div class="cart-buttons col-md-6">
                                <a id="submit" href="#" class="boxed-btn">Actualizar o Carrinho</a>
                            </div>
                            <div class="cart-buttons col-md-6">
                                <a href="{{route('loja.site.gerarFatura')}}" class="boxed-btn">Gerar Fatura(s)</a>
                            </div>
							<div class="cart-buttons col-md-6">
                                
								<a class="boxed-btn " data-toggle="modal" data-target="#ModalCreate"
								>Enviar Comprovativo</a>
                            </div>
                        </div>
					</div>

					<div class="coupon-section">
						<h3>Digite código do Cheque</h3>
						<div class="coupon-form-wrap">
							<form action="{{route('loja.site.compra')}}" method="POST">
                                @csrf
								<p><input name="cheque" type="text" placeholder="Código"></p>
								<p><input type="submit" value="Verificar"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="text-left modal fade" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">{{ __('Enviar Comprovativo') }}</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="{{route('loja.site.enviarFatura')}}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="card-body">
							<div class="row">
								<div class="col-md-2">
									<div class="form-group mb-3">
										<label for="id_fatura">Nº da Fatura</label>
										<input type="number" name="id_fatura" class="form-control" required value="{{old('id_fatura')}}">
									
									</div>

								</div>
								<div class="col-md-10">
									<div class="form-group mb-3">
										<label for="">Caminho da Fatura</label>
										<input type="file" name="caminho" id="" class="form-control" required>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary w-md">Enviar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->
    <script>
        let button = $('#submit');
        button.on('click',function(){
            $('#form_tabuleiro').submit();
        })
    </script>
	@if (session('pagamento.create.success'))
    <script>
        Swal.fire(
            'Comprovativo enviado com sucesso!',
            '',
            'success'
        )
    </script>
@endif
@endsection

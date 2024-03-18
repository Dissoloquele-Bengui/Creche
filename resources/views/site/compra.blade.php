@extends("layout.site.body")
@section("titulo","Finalizar Compra")

@section("conteudo")
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="breadcrumb-text">
						<h1>Finalizar a Compra</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- check out section -->
	<div class="checkout-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="checkout-accordion-wrap">
						<div class="accordion" id="accordionExample">
						  <div class="card single-accordion">
						    <div class="card-header" id="headingOne">
						      <h5 class="mb-0">
						        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
						          Dados da Factura
						        </button>
						      </h5>
						    </div>

						    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						      <div class="card-body">
						        <div class="billing-address-form">
						        	<form action="{{route('loja.site.checkout')}}" id="user_data" method="POST" target="_blank">
										@csrf
						        		<p><input type="text" placeholder="Name" name="nome" value="{{Auth::user()->name}}"></p>
						        		<p><input type="email" name="email" placeholder="Email" value="{{Auth::user()->email}}"></p>
						        		<p><input type="text" name="endereco" placeholder="Address" value="{{Auth::user()->endereco}}"></p>
						        		<p><input type="tel" name="telefone" placeholder="Phone"value="{{Auth::user()->contacto}}"></p>
						        	</form>
						        </div>
						      </div>
						    </div>
						  </div>

						</div>

					</div>
				</div>

				<div class="col-lg-4">
					<div class="order-details-wrap">
						<table class="order-details">
							<thead>
								<tr>
									<th>Detalhes das Suas Compras</th>
									<th>Preço</th>
								</tr>
							</thead>
							<tbody class="order-details-body">
								<tr>
									<td>Produto</td>
									<td>Total</td>
								</tr>
                                @foreach ($produtos as $produto )
								
                                    <tr>
                                        <td>{{$produto->nome}}</td>
                                        <td>{{$produto->quantidade * $produto->preco}} kzs</td>
                                    </tr>
                                @endforeach
							</tbody>
							<tbody class="checkout-details">
								<tr>
									<td>Subtotal</td>
									<td>{{$total}} Kzs</td>
								</tr>
								<tr>
									<td>Shipping</td>
									<td>1500.00 kzs</td>
								</tr>
								<tr>
									<td>Total</td>
									<td>{{$total + 1500}} kzs</td>
								</tr>
							</tbody>
						</table>
						<a href="#" target="_blank" id="pay" class="boxed-btn">Terminar a Compra</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end check out section -->
    <script>
        document.querySelector('#pay').addEventListener('click',function(){
            document.querySelector('#user_data').submit();
            window.open('/loja/site/lojas','_self');
        
        })
    </script>
@endsection

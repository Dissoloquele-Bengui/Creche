@extends("layout.site.body")
@section("titulo","Contacto")

@section("conteudo")
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="text-center col-lg-8 offset-lg-2">
					<div class="breadcrumb-text">
						<h1>Consulte as suas Facturas</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div style="margin: 10px auto!important" class="mb-5 col-lg-10 mb-lg-0">
					<div class="form-title">
						<h2>Minhas Facturas</h2>

				 	<div id="form_status"></div>
					<div class="contact-form">
                        <ul class="list-group">
                            @foreach ($faturas as $fatura)
                                <li class="list-group-item">
                                    <a href="{{route('loja.site.fatura',['id'=>$fatura->id])}}">
                                        {{$fatura->id}}/2024
                                    </a>
                                </li>
                            @endforeach
                            @if (count($faturas)==0)
                                <li class="list-group-item" style="font-size:25px">
                                    Não possues Faturas
                                </li>
                            @endif
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->




@endsection

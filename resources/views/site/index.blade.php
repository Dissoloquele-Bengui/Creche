@extends('layout.site.body')
@section('titulo',"Página Inicial")
@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center col-lg-6">
                        <h2 data-aos="fade-down">Bem-vindo à Creche Nagefa</h2>
                        <p data-aos="fade-up">A Creche Nagefa, localizada nos Mulenvos de Cima, oferece um ambiente seguro e acolhedor para as crianças, buscando manter uma melhor organização dos dados e uma comunicação eficaz com os encarregados.</p>
                        <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Comece Agora</a>
                    </div>

                </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image:url({{ asset('site/assets/img/banner.webp')}})">
            </div>
            <div class="carousel-item" style="background-image:url({{ asset('site/assets/img/banner2.webp')}})"></div>

            <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>

        </div>

    </section><!-- End Hero Section -->

@endsection
@section('conteudo')


          <!-- ======= Services Section ======= -->
          <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

              <div class="row">
                <div class="section-header">
                    <h2>Serviços Oferecidos</h2>
                    <p>A Creche Nagefa oferece uma variedade de serviços para garantir o bem-estar das crianças e uma comunicação eficaz com os encarregados. Veja abaixo alguns dos nossos principais serviços:</p>
                </div>

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon"><i class="bi bi-people"></i></div>
                    <h4 class="title"><a href="#">Cuidado Individualizado</a></h4>
                    <p class="description">Proporcionamos cuidados personalizados e individuais para cada criança, respeitando suas necessidades e ritmos.</p>
                  </div>
                </div>

                <div class="mt-4 col-lg-4 col-md-6 d-flex align-items-stretch mt-md-0">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon"><i class="bi bi-clock-history"></i></div>
                    <h4 class="title"><a href="#">Horário Flexível</a></h4>
                    <p class="description">Oferecemos horários flexíveis para atender às necessidades dos pais, com opções de período integral ou meio período.</p>
                  </div>
                </div>

                <div class="mt-4 col-lg-4 col-md-6 d-flex align-items-stretch mt-lg-0">
                  <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon"><i class="bi bi-emoji-smile"></i></div>
                    <h4 class="title"><a href="#">Atividades Lúdicas</a></h4>
                    <p class="description">Promovemos atividades lúdicas e recreativas para estimular o desenvolvimento cognitivo, emocional e social das crianças.</p>
                  </div>
                </div>

            </div>


            </div>
          </section><!-- End Services Section -->



            <!-- ======= Get Started Section ======= -->
            <section id="get-started" class="get-started ">
            <div class="container">

                <div class="row justify-content-between gy-4">

                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                        <div class="content">
                            <h3>Conheça a Creche Nagefa</h3>
                            <p>A Creche Nagefa busca manter um controle eficiente no armazenamento de dados das crianças e uma maneira eficaz na gestão das informações, apresentando relatórios e comunicados das crianças. Com o nosso sistema, favorecemos o armazenamento das informações das crianças e dos funcionários da creche, garantindo um ambiente seguro e organizado.</p>
                        </div>
                    </div>

                    <div class="col-lg-5" data-aos="fade">
                        <form action="forms/quote.php" method="post" class="php-email-form">
                            <h3>Receba mais informações</h3>
                            <p>Entre em contato conosco para receber mais informações sobre nossos serviços e programas. Estamos aqui para ajudá-lo a entender como podemos atender às necessidades da sua família.</p>
                            <div class="row gy-3">
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" placeholder="Nome" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="phone" placeholder="Telefone" required>
                                </div>
                                <div class="col-md-12">
                                    <textarea class="form-control" name="message" rows="6" placeholder="Mensagem" required></textarea>
                                </div>
                                <div class="text-center col-md-12">
                                    <div class="loading">Carregando</div>
                                    <div class="error-message"></div>
                                    <div class="sent-message">Sua solicitação foi enviada com sucesso. Obrigado!</div>
                                    <button type="submit">Receba mais informações</button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>

            </div>
            </section><!-- End Get Started Section -->
          <!-- End Recent Blog Posts Section -->
@endsection

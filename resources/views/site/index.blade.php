@extends('layout.site.body')
@section('titulo',"Página Inicial")
@section('hero')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">

        <div class="info d-flex align-items-center">
            <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 data-aos="fade-down">Bem-vindo ao <span>IPIL</span></h2>
                    <p data-aos="fade-up">O Instituto Politécnico Industrial de Luanda (IPIL) oferece oportunidades educacionais de excelência para os futuros profissionais da indústria. Nossos programas abrangem uma variedade de áreas técnicas, preparando os alunos para uma carreira de sucesso.</p>
                    <a data-aos="fade-up" data-aos-delay="200" href="#get-started" class="btn-get-started">Comece Agora</a>
                </div>

            </div>
            </div>
        </div>

        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

            <div class="carousel-item active" style="background-image:url({{ asset('site/assets/img/banner1.jpg')}})">
            </div>
            <div class="carousel-item" style="background-image:url({{ asset('site/assets/img/banner2.png')}})"></div>

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
                    <h2>Cursos Oferecidos</h2>
                    <p>Descubra os cursos de qualidade oferecidos pelo Instituto Politécnico Industrial de Luanda (IPIL). Estamos comprometidos em fornecer uma educação de excelência para preparar os estudantes para o mercado de trabalho.</p>
                </div>

            </div>

              <div class="row gy-4">

                @foreach (getCursos() as $curso)
                  <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item  position-relative">
                      <div class="icon">
                        <i class="fa-solid fa-mountain-city"></i>
                      </div>
                      <h3>{{$curso->nome}}</h3>
                      <p>{{$curso->descricao}}.</p>
                      <a href="#" class="readmore stretched-link">Learn more <i
                          class="bi bi-arrow-right"></i></a>
                    </div>
                  </div><!-- End Service Item -->
                @endforeach


              </div>

            </div>
          </section><!-- End Services Section -->


          <!-- ======= Features Section ======= -->
        {{--  <section id="features" class="features section-bg">
            <div class="container" data-aos="fade-up">

              <ul class="nav nav-tabs row  g-2 d-flex">

                <li class="nav-item col-3">
                  <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#tab-1">
                    <h4>Modisit</h4>
                  </a>
                </li><!-- End tab nav item -->

                <li class="nav-item col-3">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-2">
                    <h4>Praesenti</h4>
                  </a><!-- End tab nav item -->

                <li class="nav-item col-3">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-3">
                    <h4>Explica</h4>
                  </a>
                </li><!-- End tab nav item -->

                <li class="nav-item col-3">
                  <a class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-4">
                    <h4>Nostrum</h4>
                  </a>
                </li><!-- End tab nav item -->

              </ul>

              <div class="tab-content">

                <div class="tab-pane active show" id="tab-1">
                  <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center"
                      data-aos="fade-up" data-aos-delay="100">
                      <h3>Voluptatem dignissimos provident</h3>
                      <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore
                        magna aliqua.
                      </p>
                      <ul>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                          aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                          pariatur.</li>
                      </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center" data-aos="fade-up" data-aos-delay="200">
                      <img src="{{asset('site/assets/img/features-1.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-2">
                  <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                      <h3>Neque exercitationem debitis</h3>
                      <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore
                        magna aliqua.
                      </p>
                      <ul>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores dolores quos qui a.
                          Ipsum neque dolor voluptate nisi sed.</li>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                          aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                          pariatur.</li>
                      </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                      <img src="{{asset('site/assets/img/features-2.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-3">
                  <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                      <h3>Voluptatibus commodi accusamu</h3>
                      <ul>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check2-all"></i> Provident mollitia neque rerum asperiores dolores quos qui a.
                          Ipsum neque dolor voluptate nisi sed.</li>
                      </ul>
                      <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore
                        magna aliqua.
                      </p>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                      <img src="{{asset('site/assets/img/features-3.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div><!-- End tab content item -->

                <div class="tab-pane" id="tab-4">
                  <div class="row">
                    <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                      <h3>Omnis fugiat ea explicabo sunt</h3>
                      <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore
                        magna aliqua.
                      </p>
                      <ul>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check2-all"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check2-all"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis
                          aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla
                          pariatur.</li>
                      </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 text-center">
                      <img src="{{asset('site/assets/img/features-4.jpg')}}" alt="" class="img-fluid">
                    </div>
                  </div>
                </div><!-- End tab content item -->

              </div>

            </div>
          </section><!-- End Features Section -->
          --}}
          <!-- ======= Our Projects Section ======= -->
          <section id="projects" class="projects">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Nossos Projetos</h2>
                    <p>Explore os projetos inovadores desenvolvidos pelo Instituto Politécnico Industrial de Luanda (IPIL) e veja como nossos alunos estão contribuindo para a indústria e a sociedade.</p>
                </div>


              <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
                data-portfolio-sort="original-order">

                  {{--                <ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
                  <li data-filter="*" class="filter-active">All</li>
                  <li data-filter=".filter-remodeling">Remodeling</li>
                  <li data-filter=".filter-construction">Construction</li>
                  <li data-filter=".filter-repairs">Repairs</li>
                  <li data-filter=".filter-design">Design</li>
                </ul><!-- End Projects Filters -->--}}

                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                  
                  @foreach (getProjetos() as $projeto)
                    <div class="col-lg-4 col-md-6 portfolio-item {{--filter-remodeling--}}">
                      <div class="portfolio-content h-100">
                        <img src="{{asset(getProjectImage($projeto->id))}}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                          <h4>{{$projeto->nome}}</h4>
                          <p>{{$projeto->descricao}}</p>
                          <a href="{{asset(getProjectImage($projeto->id))}}" title="Remodeling 1"
                            data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                              class="bi bi-zoom-in"></i></a>
                          {{--<a href="project-details.html" title="More Details" class="details-link"><i
                              class="bi bi-link-45deg"></i></a>--}}
                        </div>
                      </div>
                    </div><!-- End Projects Item -->
                  @endforeach

                </div><!-- End Projects Container -->

              </div>

            </div>
          </section><!-- End Our Projects Section -->

          <!-- ======= Testimonials Section ======= -->
          <section id="testimonials" class="testimonials section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>Depoimentos</h2>
                    <p>Veja o que nossos alunos e parceiros têm a dizer sobre sua experiência no Instituto Politécnico Industrial de Luanda (IPIL) e como nossa instituição os ajudou a alcançar seus objetivos profissionais.</p>
                </div>


              <div class="slides-2 swiper">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{asset('site/assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                        <h3>Saul Goodman</h3>
                        <h4>Ceo &amp; Founder</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
                          Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{asset('site/assets/img/testimonials/testimonials-2.jpg')}}" class="testimonial-img" alt="">
                        <h3>Sara Wilsson</h3>
                        <h4>Designer</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis
                          quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{asset('site/assets/img/testimonials/testimonials-3.jpg')}}" class="testimonial-img" alt="">
                        <h3>Jena Karlis</h3>
                        <h4>Store Owner</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim
                          tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{asset('site/assets/img/testimonials/testimonials-4.jpg')}}" class="testimonial-img" alt="">
                        <h3>Matt Brandon</h3>
                        <h4>Freelancer</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit
                          minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                  <div class="swiper-slide">
                    <div class="testimonial-wrap">
                      <div class="testimonial-item">
                        <img src="{{asset('site/assets/img/testimonials/testimonials-5.jpg')}}" class="testimonial-img" alt="">
                        <h3>John Larson</h3>
                        <h4>Entrepreneur</h4>
                        <div class="stars">
                          <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                          <i class="bi bi-quote quote-icon-left"></i>
                          Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim
                          culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum
                          quid.
                          <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                      </div>
                    </div>
                  </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
              </div>

            </div>
          </section><!-- End Testimonials Section -->

          <!-- ======= Recent Blog Posts Section ======= -->
          {{--<section id="recent-blog-posts" class="recent-blog-posts">
              <div class="container" data-aos="fade-up"">



                  <div class=" section-header">
                      <h2>Recent Blog Posts</h2>
                      <p>In commodi voluptatem excepturi quaerat nihil error autem voluptate ut et officia consequuntu</p>
                  </div>

                  <div class="row gy-5">

                      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                      <div class="post-item position-relative h-100">

                          <div class="post-img position-relative overflow-hidden">
                          <img src="{{asset('site/assets/img/blog/blog-1.jpg')}}" class="img-fluid" alt="">
                          <span class="post-date">December 12</span>
                          </div>

                          <div class="post-content d-flex flex-column">

                          <h3 class="post-title">Eum ad dolor et. Autem aut fugiat debitis</h3>

                          <div class="meta d-flex align-items-center">
                              <div class="d-flex align-items-center">
                              <i class="bi bi-person"></i> <span class="ps-2">Julia Parker</span>
                              </div>
                              <span class="px-3 text-black-50">/</span>
                              <div class="d-flex align-items-center">
                              <i class="bi bi-folder2"></i> <span class="ps-2">Politics</span>
                              </div>
                          </div>

                          <hr>

                          <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                              class="bi bi-arrow-right"></i></a>

                          </div>

                      </div>
                      </div><!-- End post item -->

                      <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                      <div class="post-item position-relative h-100">

                          <div class="post-img position-relative overflow-hidden">
                          <img src="{{asset('site/assets/img/blog/blog-2.jpg')}}" class="img-fluid" alt="">
                          <span class="post-date">July 17</span>
                          </div>

                          <div class="post-content d-flex flex-column">

                          <h3 class="post-title">Et repellendus molestiae qui est sed omnis</h3>

                          <div class="meta d-flex align-items-center">
                              <div class="d-flex align-items-center">
                              <i class="bi bi-person"></i> <span class="ps-2">Mario Douglas</span>
                              </div>
                              <span class="px-3 text-black-50">/</span>
                              <div class="d-flex align-items-center">
                              <i class="bi bi-folder2"></i> <span class="ps-2">Sports</span>
                              </div>
                          </div>

                          <hr>

                          <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                              class="bi bi-arrow-right"></i></a>

                          </div>

                      </div>
                      </div><!-- End post item -->

                      <div class="col-xl-4 col-md-6">
                      <div class="post-item position-relative h-100" data-aos="fade-up" data-aos-delay="300">

                          <div class="post-img position-relative overflow-hidden">
                          <img src="{{asset('site/assets/img/blog/blog-3.jpg')}}" class="img-fluid" alt="">
                          <span class="post-date">September 05</span>
                          </div>

                          <div class="post-content d-flex flex-column">

                          <h3 class="post-title">Quia assumenda est et veritati tirana ploder</h3>

                          <div class="meta d-flex align-items-center">
                              <div class="d-flex align-items-center">
                              <i class="bi bi-person"></i> <span class="ps-2">Lisa Hunter</span>
                              </div>
                              <span class="px-3 text-black-50">/</span>
                              <div class="d-flex align-items-center">
                              <i class="bi bi-folder2"></i> <span class="ps-2">Economics</span>
                              </div>
                          </div>

                          <hr>

                          <a href="blog-details.html" class="readmore stretched-link"><span>Read More</span><i
                              class="bi bi-arrow-right"></i></a>

                          </div>

                      </div>
                      </div><!-- End post item -->

                  </div>

              </div>
        </section>--}}
            <!-- ======= Get Started Section ======= -->
            <section id="get-started" class="get-started ">
            <div class="container">

                <div class="row justify-content-between gy-4">

                    <div class="col-lg-6 d-flex align-items-center" data-aos="fade-up">
                        <div class="content">
                            <h3>Descubra o Futuro da Indústria</h3>
                            <p>Explore as oportunidades educacionais oferecidas pelo Instituto Politécnico Industrial de Luanda (IPIL) e descubra como podemos ajudá-lo a alcançar seus objetivos profissionais. Nossos programas de ensino técnico e profissional preparam você para uma carreira de sucesso na indústria.</p>
                            <p>Desenvolva suas habilidades com instrutores qualificados e obtenha experiência prática em nossos laboratórios e oficinas modernos. No IPIL, estamos comprometidos em oferecer uma educação de qualidade que atenda às demandas do mercado de trabalho.</p>
                        </div>
                    </div>

                    <div class="col-lg-5" data-aos="fade">
                        <form action="forms/quote.php" method="post" class="php-email-form">
                            <h3>Receba mais informações</h3>
                            <p>Entre em contato conosco para receber mais informações sobre nossos cursos e programas de educação. Estamos aqui para ajudá-lo a dar o próximo passo em sua jornada educacional e profissional.</p>
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
                                <div class="col-md-12 text-center">
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

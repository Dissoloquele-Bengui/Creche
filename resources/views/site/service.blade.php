@extends('layout.site.body')
@section('titulo',"Serviços")
@section('hero')

@endsection
@section('conteudo')
<div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/breadcrumbs-bg.jpg')}});">
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

      <h2>Services</h2>
      <ol>
        <li><a href="{{route('home')}}">Home</a></li>
        <li>Services</li>
      </ol>

    </div>
  </div><!-- End Breadcrumbs -->

  <!-- ======= Services Section ======= -->
  <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="service-item  position-relative">
            <div class="icon">
              <i class="fa-solid fa-mountain-city"></i>
            </div>
            <h3>Nesciunt Mete</h3>
            <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores iure perferendis
              tempore et consequatur.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-arrow-up-from-ground-water"></i>
            </div>
            <h3>Eosle Commodi</h3>
            <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum hic non ut
              nesciunt dolorem.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-compass-drafting"></i>
            </div>
            <h3>Ledo Markt</h3>
            <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci
              eos earum corrupti.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-trowel-bricks"></i>
            </div>
            <h3>Asperiores Commodit</h3>
            <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident
              adipisci neque.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-helmet-safety"></i>
            </div>
            <h3>Velit Doloremque</h3>
            <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem
              alias eius labore.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fa-solid fa-arrow-up-from-ground-water"></i>
            </div>
            <h3>Dolori Architecto</h3>
            <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti
              recusandae ducimus enim.</p>
            <a href="service-details.html" class="readmore stretched-link">Learn more <i
                class="bi bi-arrow-right"></i></a>
          </div>
        </div><!-- End Service Item -->

      </div>

    </div>
  </section><!-- End Services Section -->

  <!-- ======= Servie Cards Section ======= -->
  <section id="services-cards" class="services-cards">
    <div class="container" data-aos="fade-up">

      <div class="row gy-4">

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
          <h3>Quasi eaque omnis</h3>
          <p>Eius non minus autem soluta ut ui labore omnis quisquam corrupti autem odit voluptas quos commodi magnam
            occaecati.</p>
          <ul class="list-unstyled">
            <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip</span></li>
            <li><i class="bi bi-check2"></i> <span>Duis aute irure dolor in reprehenderit</span></li>
            <li><i class="bi bi-check2"></i> <span>Ullamco laboris nisi ut aliquip ex ea</span></li>
          </ul>
        </div><!-- End feature item-->

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
          <h3>Et nemo dolores consectetur</h3>
          <p>Ducimus ea quam et occaecati est. Temporibus in soluta labore voluptates aut. Et sit soluta non repellat
            sed quia dire plovers tradoria</p>

          <ul class="list-unstyled">
            <li><i class="bi bi-check2"></i> <span>Enim temporibus maiores eligendi</span></li>
            <li><i class="bi bi-check2"></i> <span>Ut maxime ut quibusdam quam qui</span></li>
            <li><i class="bi bi-check2"></i> <span>Officiis aspernatur in officiis</span></li>
          </ul>
        </div><!-- End feature item-->

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
          <h3>Staque laboriosam modi</h3>
          <p>Velit eos error et dolor omnis voluptates nobis tenetur sed enim nihil vero qui suscipit ipsum at magni.
            Ipsa architecto consequatur aliquam</p>
          <ul class="list-unstyled">
            <li><i class="bi bi-check2"></i> <span>Quis voluptates laboriosam numquam</span></li>
            <li><i class="bi bi-check2"></i> <span>Treva libero sunt quis veniam ut</span></li>
            <li><i class="bi bi-check2"></i> <span>Debitis eos est est corrupti</span></li>
          </ul>
        </div><!-- End feature item-->

        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
          <h3>Dignissimos suscipit iste</h3>
          <p>Molestiae occaecati assumenda quia saepe nobis recusandae at dicta ducimus sequi numquam commodi est in
            consequatur ea magnam quia itaque</p>
          <ul class="list-unstyled">
            <li><i class="bi bi-check2"></i> <span>Veritatis qui reprehenderit quis</span></li>
            <li><i class="bi bi-check2"></i> <span>Accusantium vel numquam sunt minus</span></li>
            <li><i class="bi bi-check2"></i> <span>Voluptatem pariatur est sationem</span></li>
          </ul>
        </div><!-- End feature item-->

      </div>

    </div>
  </section><!-- End Servie Cards Section -->




  @endsection

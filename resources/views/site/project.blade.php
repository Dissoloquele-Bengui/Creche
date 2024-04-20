@extends('layout.site.body')
@section('titulo',"Serviços")
@section('hero')

@endsection
@section('conteudo')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/banner2.webp')}});">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>Projects</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Projects</li>
          </ol>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Our Projects Section ======= -->
      <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">

          <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry"
            data-portfolio-sort="original-order">

            {{--<ul class="portfolio-flters" data-aos="fade-up" data-aos-delay="100">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-remodeling">Remodeling</li>
              <li data-filter=".filter-construction">Construction</li>
              <li data-filter=".filter-repairs">Repairs</li>
              <li data-filter=".filter-design">Design</li>
            </ul>--}}<!-- End Projects Filters -->

            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

              @foreach (getProjetos() as $projeto)
              <div class="col-lg-4 col-md-6 portfolio-item">
                <div class="portfolio-content h-100">
                  <img src="{{asset(getProjectImage($projeto->id))}}" class="img-fluid" alt="" heigth="250px">
                  <div class="portfolio-info">
                    <h4>{{$projeto->nome}}</h4>
                    <p>{{$projeto->descricao}}</p>
                    <a href="{{asset(getProjectImage($projeto->id))}}" title="Remodeling 1"
                      data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i
                        class="bi bi-zoom-in"></i></a>
                     {{-- <a href="project-details.html" title="More Details" class="details-link"><i
                        class="bi bi-link-45deg"></i></a>--}}
                  </div>
                </div>
              </div><!-- End Projects Item -->

              @endforeach

            </div><!-- End Projects Container -->

          </div>

        </div>
      </section><!-- End Our Projects Section -->


  @endsection

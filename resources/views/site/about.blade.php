@extends('layout.site.body')
@section('titulo',"Sobre")
@section('hero')

@endsection
@section('conteudo')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/banner2.webp')}});">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>Sobre</h2>
          <ol>
            <li><a href="/">Início</a></li>
            <li>Sobre</li>
          </ol>

        </div>
    </div><!-- End Breadcrumbs -->

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="row position-relative">

            <div class="col-lg-7 about-img" style="background-image: url({{asset('site/assets/img/banner3.webp')}});"></div>

            <div class="col-lg-7">
              <h2>Sobre a Creche Nagefa</h2>
              <div class="our-story">
                <h4>Cuidando das nossas crianças desde 2005</h4>
                <h3>Nossa História</h3>
                <p>A Creche Nagefa, fundada em 2005 e situada nos Mulenvos de Cima, é um espaço dedicado ao cuidado e desenvolvimento das crianças em Luanda, Angola. Nosso objetivo é proporcionar um ambiente seguro, acolhedor e estimulante para as crianças, enquanto oferecemos suporte e tranquilidade aos encarregados.</p>
                <ul>
                  <li><i class="bi bi-check-circle"></i> <span>Oferecemos cuidados e educação para crianças de 6 meses a 6 anos</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Contamos com uma equipe qualificada e experiente de educadores e cuidadores</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Proporcionamos um ambiente seguro, limpo e estimulante para o desenvolvimento das crianças</span></li>
                </ul>
                <p>Nossa missão é promover o desenvolvimento integral das crianças, estimulando seu crescimento físico, cognitivo, emocional e social, enquanto estabelecemos uma parceria sólida com os encarregados para garantir o melhor cuidado e educação possível.</p>

              </div>
            </div>

          </div>

        </div>
      </section>

      <!-- End About Section -->





@endsection

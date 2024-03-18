@extends('layout.site.body')
@section('titulo',"Página Inicial")
@section('hero')

@endsection
@section('conteudo')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/breadcrumbs-bg.jpg')}});">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>About</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>About</li>
          </ol>

        </div>
    </div><!-- End Breadcrumbs -->

      <!-- ======= About Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">
      
          <div class="row position-relative">
      
            <div class="col-lg-7 about-img" style="background-image: url({{asset('site/assets/img/about.jpg')}});"></div>
      
            <div class="col-lg-7">
              <h2>Sobre o Instituto Médio Industrial de Luanda</h2>
              <div class="our-story">
                <h4>Desde 1988</h4>
                <h3>Nossa História</h3>
                <p>O Instituto Médio Industrial de Luanda é uma instituição de ensino técnico profissional localizada em Luanda, Angola. Desde a sua fundação em 1988, tem sido um centro de excelência na formação de profissionais nas áreas de eletricidade, mecânica, informática, construção civil e muito mais.</p>
                <ul>
                  <li><i class="bi bi-check-circle"></i> <span>Oferecemos uma variedade de cursos técnicos e de formação profissional</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Preparamos os alunos para o mercado de trabalho com habilidades práticas</span></li>
                  <li><i class="bi bi-check-circle"></i> <span>Fornecemos conhecimentos especializados em diversas áreas</span></li>
                </ul>
                <p>Nossa missão é proporcionar uma educação de qualidade que capacite os alunos a se destacarem em suas carreiras profissionais e contribuírem para o desenvolvimento da sociedade angolana.</p>
      
              </div>
            </div>
      
          </div>
      
        </div>
      </section>
      
      <!-- End About Section -->




      <!-- ======= Our Team Section ======= -->
      <section id="team" class="team">
        <div class="container" data-aos="fade-up">

          <div class="section-header">
            <h2>Nosso Time</h2>
            <p>O nosso time é composto por profissionais dedicados e apaixonados pelo ensino técnico profissional. Estamos empenhados em proporcionar uma experiência educacional de qualidade e preparar os nossos alunos para enfrentarem os desafios do mercado de trabalho com confiança e competência.</p>

          </div>

          <div class="row gy-5">

            @foreach (getProfessores() as $professor)
              <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                <div class="member-img">
                  <img src="{{asset('site/assets/img/team/team-1.jpg')}}" class="img-fluid" alt="">
                  <div class="social">
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info text-center">
                  <h4>{{$professor->nome}}</h4>
                  <span>Professor</span>
                </div>
              </div><!-- End Team Member -->
            @endforeach

          </div>

        </div>
      </section><!-- End Our Team Section -->


@endsection

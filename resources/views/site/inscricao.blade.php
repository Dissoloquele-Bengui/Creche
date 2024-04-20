@extends('layout.site.body')
@section('titulo',"Inscrição")
@section('hero')

@endsection
@section('conteudo')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url({{asset('site/assets/img/banner2.webp')}});">
        <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

          <h2>Procedimentos</h2>
          <ol>
            <li><a href="{{route('home')}}">Home</a></li>
            <li>Procedimentos/Inscrição</li>
          </ol>

        </div>
      </div><!-- End Breadcrumbs -->

      <!-- ======= Our Projects Section ======= -->
      <section id="projects" class="projects">

        <div class="container">
            <h2 class="mb-4 text-center">Processo de Inscrição na Creche Nagefa</h2>
            <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-6">
                <h3>Preencha o Formulário de Inscrição</h3>
                <p>Preencha o formulário de inscrição online disponível no site oficial da Creche Nagefa. Certifique-se de fornecer todas as informações necessárias com precisão e clareza.</p>
              </div>
              <div class="col-lg-6">
                <h3>Entrevista e Avaliação</h3>
                <p>Após o recebimento do seu formulário de inscrição, você será convocado para uma entrevista e avaliação. Este é um passo importante para entender melhor suas necessidades e os requisitos da creche.</p>
              </div>
            </div>
            <div class="mt-4 row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
              <div class="col-lg-6">
                <h3>Documentação</h3>
                <p>Prepare todos os documentos necessários, como cópias do RG da criança, comprovante de residência, cartão de vacinação, entre outros. Estes documentos serão necessários durante o processo de inscrição.</p>
              </div>
              <div class="col-lg-6">
                <h3>Matrícula</h3>
                <p>Após a aprovação no processo de entrevista e avaliação, você será orientado sobre os próximos passos para efetuar a matrícula da criança na Creche Nagefa. Certifique-se de seguir todas as instruções fornecidas para garantir uma matrícula bem-sucedida.</p>
              </div>
            </div>
          </div>
      </section><!-- End Our Projects Section -->
  @endsection

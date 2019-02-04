{{-- <section id="hero" class="fadeIn">
  <div class="hero-container">
    <h1 class="text-warning"><b>{{ env('APP_WELCOME_MESSAGE') }}</b></h1>
    <h2 style="color:#fff;">{{ env('APP_WELCOME_WORD_SAY') }}</h2>
    <img src="{{ asset('assets/themes/company-profile/img/avocadotech.png') }}" alt="LOGO">
  </div>
</section> --}}

<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('assets/themes/company-profile/img/hero-bg2.png') }}"" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/themes/company-profile/img/hero-bg2.png') }}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{ asset('assets/themes/company-profile/img/hero-bg2.png') }}" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
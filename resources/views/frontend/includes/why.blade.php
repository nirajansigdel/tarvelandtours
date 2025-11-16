
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

  <style>
    .bg-hero {
      background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('{{ asset('image/destin.jpg') }}') center center / cover no-repeat fixed;
      height: 100vh;
    }
  </style>


<!-- HERO SECTION -->
<section class="bg-hero d-flex flex-column justify-content-center align-items-center text-center text-white">
  <div class="container row col-md-8 fcc">
    <p class="text-warning fs-2">{{ __('messages.why_choose_us') }}</p>
    <p class="fw-bold display-4">{{ __('messages.beauty_of_world') }}</p>
    <a href="{{ route('Contact') }}" class="btn btn-outline-light rounded-pill px-4 py-3 mt-3  col-md-2">{{ __('messages.contact_us') }}</a>
  </div>
</section>

<!-- CARDS SECTION -->
<section class="section-overlap pb-5">
  <div class="container">
    <div class="row g-4">
      <!-- Card 1 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
        <div class="card card-bg border-0 text-center p-4">
          <div class="icon-circle">
            <i class="fas fa-plane"></i>
          </div>
          <div class="card-body">
            <h5 class="fw-bold text-warning">{{ __('messages.tour_and_travel') }}</h5>
            <p class="text-muted">{{ __('messages.tour_and_travel_desc') }}</p>
          </div>
        </div>
      </div>

      <!-- Card 2 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
        <div class="card card-bg border-0 text-center p-4">
          <div class="icon-circle">
            <i class="fas fa-compass"></i>
          </div>
          <div class="card-body">
            <h5 class="fw-bold text-warning">{{ __('messages.campus') }}</h5>
            <p class="text-muted">{{ __('messages.campus_desc') }}</p>
          </div>
        </div>
      </div>

      <!-- Card 3 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
        <div class="card card-bg border-0 text-center p-4">
          <div class="icon-circle">
            <i class="fas fa-hiking"></i>
          </div>
          <div class="card-body">
            <h5 class="fw-bold text-warning">{{ __('messages.adventure_tour') }}</h5>
            <p class="text-muted">{{ __('messages.adventure_tour_desc') }}</p>
          </div>
        </div>
      </div>

      <!-- Card 4 -->
      <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
        <div class="card card-bg border-0 text-center p-4">
          <div class="icon-circle">
            <i class="fas fa-camera"></i>
          </div>
          <div class="card-body">
            <h5 class="fw-bold text-warning">{{ __('messages.photography') }}</h5>
            <p class="text-muted">{{ __('messages.photography_desc_why') }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>



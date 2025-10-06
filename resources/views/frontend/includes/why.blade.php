
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <!-- AOS Animation -->
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

  <style>
    .bg-hero {
      background: linear-gradient(rgba(0,0,0,0.1), rgba(0,0,0,0.2)), url('{{ asset('image/destin.jpg') }}') center center / cover no-repeat fixed;
      height: 100vh;
    }

    .icon-circle {
      width: 80px;
      height: 80px;
      background-color: #ff8c22;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 32px;
      color: #fff;
      margin: 0 auto 1rem;
    }

    

    .card-bg:hover {
      transform: translateY(-10px);
    }

    .section-overlap {
      margin-top: -100px;
      position: relative;
      z-index: 10;
    }
  </style>


<!-- HERO SECTION -->
<section class="bg-hero d-flex flex-column justify-content-center align-items-center text-center text-white">
  <div class="container row col-md-8 fcc">
    <p class="text-warning fs-2">Why choose us</p>
    <h1 class="fw-bold display-4">Let Us Show You The Beauty Of The World</h1>
    <a href="#" class="btn btn-outline-light rounded-pill px-4 py-3 mt-3  col-md-2">Contact Us</a>
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
            <h5 class="fw-bold text-warning">Tour And Travel</h5>
            <p class="text-muted">Experience Nepal’s natural beauty through stunning trekking paths, complete with easy-to-follow map guides.</p>
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
            <h5 class="fw-bold text-warning">Campus</h5>
            <p class="text-muted">We offer campus tours with guided visits, meet-and-greets, and info sessions to help you explore firsthand.</p>
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
            <h5 class="fw-bold text-warning">Adventure Tour</h5>
            <p class="text-muted">Join Adventure Tour for an exciting, experience full of thrilling activities and unforgettable memories!.</p>
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
            <h5 class="fw-bold text-warning">Photography</h5>
            <p class="text-muted">Capture unforgettable moments of your Nepal adventure through stunning photography.</p>
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



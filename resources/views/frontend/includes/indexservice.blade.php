<style>
  .section-title {
    color: #f26522;
    font-weight: 600;
  }

  .main-heading {
    font-weight: 700;
    font-size: 2.5rem;
  }

  .feature-icon {
    font-size: 2.5rem;
    color: #f26522;
    margin-bottom: 10px;
  }

  .feature-title {
    font-size: 1.1rem;
    font-weight: 400;
    width: 100%;
  }


  .service-img {
    width: 100%;
    height: 92vh;
    object-fit: cover;

  }

  @media (max-width: 768px) {
    .main-heading {
      font-size: 2rem;
    }

    .feature-title {
      font-size: 1rem;
    }

    .feature-icon {
      font-size: 2rem;
    }
     .controlwidth{
    width:279px !important;
  }
  }
</style>

<section class="container-fluid">
<div class="container py-5">
  <div class="row align-items-center justify-content-between">
    <!-- Left Content -->
    <div class="col-lg-6 mb-4 mb-lg-0">
      <p class="heading">Our Services</p>
      <h1 class="extralarge mb-3">Join The Adventure With Stories</h1>
      <p class="text-muted mb-4">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
        standard dummy text ever since the 1500s.
      </p>

      <!-- Features -->
      <div class="row text-center mb-4">
        <div class="col-4 text-center">
          <img src="{{ asset('image/services-1.svg') }}" alt="" class="iconsimg">
          <div class="feature-title mt-1">Custom Destinations</div>
        </div>
        <div class="col-4 text-center">
          <img src="{{ asset('image/services-2.svg') }}" alt="" class="iconsimg">
          <div class="feature-title mt-2">Unforgettable Moments</div>
        </div>
        <div class="col-4 text-center">
          <img src="{{ asset('image/services-3.svg') }}" alt="" class="iconsimg">
          <div class="feature-title mt-2 ">Competitive Pricings</div>
        </div>
      </div>

      <!-- CTA -->
      <a href="#" class="btn cta-button">See All Services</a>
    </div>

   
    <!-- Right Image -->

    <div class="col-lg-5 position-relative d-flex justify-content-center">
      <div class="col-md-10">
        <!-- Image -->
        <img src="{{ asset('image/destin.jpg') }}" alt="Service" class="img-fluid rounded shadow service-img">

        <!-- Experience Badge -->
        <!-- Experience Circle (on top) -->
        <div
          class="position-absolute expercircle text-white rounded-circle d-flex flex-column justify-content-center align-items-center fw-bold"
          style="width: 190px; height: 190px; bottom: 50px; left: -60px; z-index: 2;">
          <div style="font-size:40px;">15+</div>
          <div style="font-size:20px; text-align: center;">Years of<br>experience</div>
        </div>

        <!-- Customers Banner (under the circle) -->
        <div class="position-absolute text-white text-center py-4 px-3 controlwidth"
          style="background-color: #0E2F57; bottom: -40px; width:444px; border-radius: 6px; z-index: 1;">
          <div class="fw-bold" style="font-size:40px;">1K+</div>
          <small class="xs-text-des">Customize Service</small>
        </div>

      </div>
    </div>
  </div>
</div>
</section>
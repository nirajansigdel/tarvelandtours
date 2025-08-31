<style>
  .object-fit-cover {
    object-fit: cover;
  }

  .play-button {
    width: 60px;
    height: 60px;
  }
   .custom-section-height {
    height: 650px;
  }
  .rightcol {
    background:var(--primary);
  }
</style>

<section class="bg-light py-5">
  <div class="container-fluid">
    <div class="container">
    <div class="row g-0 custom-section-height">
      <!-- Left: Full-height image with play button -->
      <div class="col-lg-6 position-relative d-flex align-items-center">
        <div class="w-100 h-100 position-relative">
          <div class="w-100 h-100 bg-light d-flex align-items-center justify-content-center">
    <i class="fas fa-mountain fa-3x text-muted"></i>
</div>
          <!-- Play Button -->
          <a href="#" class="position-absolute top-50 start-50 translate-middle btn btn-warning rounded-circle d-flex align-items-center justify-content-center play-button shadow">
            <i class="fas fa-play text-white"></i>
          </a>
        </div>
      </div>

      <!-- Right: Full-height text content -->
      <div class="col-lg-6 d-flex flex-column justify-content-center text-white px-5 rightcol">
        <h2 class="extralarge">What We Do</h2>
        <h2 class="fw-bold mb-3">Exploring The World Without Limits</h2>
        <p class="text-light mb-4">
          From crystal-clear waters to thrilling adventures, we craft experiences that take you beyond boundaries. Whether you're seeking relaxation or excitement, our tours deliver memories that last a lifetime.
        </p>
        <a href="#" class="btn cta-button col-md-4">
          Learn More <i class="fas fa-arrow-right ms-2"></i>
        </a>
      </div>

    </div>
  </div>
  </div>
</section>

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
  .forpadding{
    padding-top:50px;
  }
</style>

<section class="bg-light">
  <div class="container-fluid forpadding">
    <div class="container">
    <div class="row g-0 custom-section-height">
      <!-- Left: Full-height image with play button -->
      <div class="col-lg-6 position-relative d-flex align-items-center">
        <div class="w-100 h-100 position-relative">
          <img src="{{ asset('image/destin.jpg') }}" alt="Adventure" class="w-100 h-100 object-fit-cover">
          <!-- Play Button -->
          <a href="#" class="position-absolute top-50 start-50 translate-middle btn btn-warning rounded-circle d-flex align-items-center justify-content-center play-button shadow">
            <i class="fas fa-play text-white"></i>
          </a>
        </div>
      </div>

      <!-- Right: Full-height text content -->
      <div class="col-lg-6 d-flex flex-column justify-content-center text-white px-5 rightcol">
        <h2 class="extralarge">{{ __('messages.what_we_do') }}</h2>
        <h3 class="fw-bold mb-3">{{ __('messages.exploring_world_limits') }}</h3>
        <p class="text-light mb-4">
          {{ __('messages.what_we_do_description') }}
        </p>
        <a href="{{ route("About") }}" class="btn cta-button col-md-4">
          {{ __('messages.learn_more') }} <i class="fas fa-arrow-right ms-2"></i>
        </a>
      </div>

    </div>
  </div>
  </div>
</section>

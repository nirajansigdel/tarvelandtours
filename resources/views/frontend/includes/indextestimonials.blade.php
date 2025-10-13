

<style>
  @media (max-width: 768px) {
  .testimonial-carousel .slick-slide {
    padding: 10px;
  }
  .testimonial-carousel .bg-white {
    padding: 20px;
  }
  .heading {
    font-size: 1.8rem;
  }
  .extralarger {
    font-size: 1rem;
  }
}

</style>
<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row mb-4">
      <div class="col-6 text-white">
        <h1 class="heading">{{ __('messages.testimonials') }}</h1>
        <p class="extralarger">{{ __('messages.hear_happy_travelers') }}</p>

      </div>
    </div>

    <div class="testimonial-carousel">
      @foreach($testimonials as $testimonial)
      <div class="px-2">
        <div class="bg-white p-4 text-center shadow-sm rounded d-flex flex-column align-items-center">
          <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}"
               alt="{{ $testimonial->name }}"
               class="rounded-circle mb-3"
               style="width: 100px; height: 100px; object-fit: cover;">

        <h5 class="fw-bold mb-1">{{ $testimonial->name }}</h5>
        <p class="text-muted mb-2">{{ $testimonial->position ?? __('messages.tourist') }}</p>

          <div class="text-warning mb-3">
            @for ($i = 0; $i < 5; $i++)
              <i class="fas fa-star"></i>
            @endfor
          </div>

          <p class="text-muted small">{{ $testimonial->description }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Slick JS Config -->
<script>
  $(document).ready(function () {
    $('.testimonial-carousel').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      autoplay: true,
      autoplaySpeed: 4000,
      responsive: [
        {
          breakpoint: 992, // Tablets
          settings: {
            slidesToShow: 2
          }
        },
        {
          breakpoint: 768, // Mobile
          settings: {
            slidesToShow: 1,
            arrows: false,
            dots: true
          }
        }
      ]
    });
  });
</script>

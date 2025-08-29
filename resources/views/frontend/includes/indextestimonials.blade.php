<section class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row mb-4">
      <div class="col-6 text-white">
        <h1 class="heading">Testimonials</h1>
        <p class="extralarger">Hear What Our Happy Travelers Have to Say.</p>

      </div>
    </div>
    <div class="testimonial-carousel">
      @foreach($testimonials as $testimonial)
      <div class="px-2">
      <div class="bg-white p-4 text-center shadow-sm rounded">
        <img src="{{ asset('uploads/testimonial/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
        class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit: cover;">

        <h5 class="fw-bold mb-1">{{ $testimonial->name }}</h5>
        <p class="text-muted mb-2">{{ $testimonial->position ?? 'Tourist' }}</p>

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


<script>
  $(document).ready(function () {
    $('.testimonial-carousel').slick({
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: true,
      dots: true,
      autoplay: true,
      autoplaySpeed: 4000,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1
          }
        }
      ]
    });
  });
</script>
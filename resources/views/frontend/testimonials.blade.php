
<!-- herosection for about contact and dem -->

  @extends('frontend.layouts.master')
@section('content')
<!-- herosection for about contact and dem -->
<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/gallery.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Testimonials</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Testimonials
                </p>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: #f8f9fa;">
  <div class="container">
    <div class="row mb-4">
      <div class="col-6 text-white">
        <h1 class="heading">Testimonials</h1>
        <p class="extralarger">Hear What Our Happy Travelers Have to Say.</p>

      </div>
    </div>
    <div class="row g-4 justify-content-center">
      @foreach($testimonials as $testimonial)
      <div class="col-md-4">
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


@endsection




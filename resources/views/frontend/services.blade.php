@extends('frontend.layouts.master')
@section('content')


<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/q.avif') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">our service</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    service
                </p>
            </div>
        </div>
    </section>
  <!-- multiple post of service -->
  <style>
    .item .col-md-10 {
    position: relative;
    overflow: hidden;
    /* To keep everything inside the card */
    background: linear-gradient(to top, #F2F2FF 0%, #E6E6FF 40%, #FAFAFA 100%);
    border-radius: 10px;
    transition: all 0.3s ease-in-out;
    /* Smooth transition */
    padding: 24px 2px;
    min-height: 40vh;
    }
  </style>


  <section class="container-fluid py-5" style="background: #f8fafc;">
    <div class="container">
    <div class="text-center mb-5">
      <h1 class="fw-bold" style="color: #222;">List of Our Services</h1>
      <p class="fs-5 text-muted fst-italic">"Empowering communities through dedicated service and care."</p>
    </div>

    @foreach ($services as $index => $service)
    <div class="row align-items-center mb-5">
      <!-- Image column -->
      <div class="col-md-6 d-flex justify-content-center 
      {{ $index % 2 == 0 ? 'order-1 order-md-2' : 'order-1 order-md-1' }}">
      <div class="overflow-hidden rounded" style="max-width: 400px; max-height: 250px;">
      @if ($service->image)
      <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Service Image" class="img-fluid"
      style="object-fit: cover; width: 100%; height: 100%;">
      @else
      <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=800&auto=format&fit=crop&q=60"
      alt="Default Image" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
      @endif
      </div>
      </div>

      <!-- Text column -->
      <div class="col-md-6 d-flex flex-column 
      {{ $index % 2 == 0 ? 'order-2 order-md-1' : 'order-2 order-md-2' }}">
      <h3 class="fw-bold text-dark">{{ Str::limit(strip_tags($service->title), 40) }}</h3>
      <p class="contentdesc" style="line-height: 1.5;">
      {!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->description)), 350) !!}

      </p>
      <a href="{{ route('SingleService', ['slug' => $service->slug]) }}"
      class="text-dark fw-semibold  text-decoration-none content-button " style="width: fit-content;text-decoration:none">
      Read more
      <i class="bi bi-arrow-right fw-semibold"></i>
      </a>
      </div>
    </div>
    @endforeach
    </div>
  </section>




@endsection
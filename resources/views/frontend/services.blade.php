@extends('frontend.layouts.master')
@section('content')


<section class="position-relative text-white text-center mb-5"
        style="background: url('{{ asset('image/check.jpg') }}') center center / cover no-repeat; height:400px;">
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


  <section class="container-fluid py-3" >
    <div class="container">
   
    </div>
  </section>



<section class="section-overlap pt-5">
  <div class="container">
     <div class="text-center mb-5">
      <h1 class="fw-bold" style="color: #222;">List of Our Services</h1>
      <p class="fs-5 text-muted fst-italic">"Empowering communities through dedicated service and care."</p>
    </div>
    <div class="row g-4">
       @foreach ($services as $index => $service)
      <!-- Card 1 -->
      <a href="{{ route('SingleService', ['slug' => $service->slug]) }}" class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100" style="text-decoration: none;">
      
        <div class="card card-bg border-0">
          <div class="icon-circle">
            <img src="{{ asset('uploads/service/' . $service->image) }}" alt="Service Image" class="img-fluid"
     style="object-fit: cover; width: 100%; height: 100%; border-radius: 50%;">

          </div>
          <div class="card-body">
            <h5 class="fw-bold text-warning">{{ Str::limit(strip_tags($service->title), 36) }}</h5>
            <p class="text-muted">{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->description)), 300) !!}</p>
          </div>
        </div>
      </a>


@endforeach
    </div>
  </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 1000,
    once: true
  });
</script>

@endsection
@extends('frontend.layouts.master')

@section('content')
<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/blog.webp') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Our Stories</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Blogs
                </p>
            </div>
        </div>
    </section>


<section class="container-fluid bg-light">
<div class="container py-5 ">
    <div class="directors-header mb-5 text-center">
            <h1 class="heading mb-1"> Collection of Blogs</h1>
            <p class="extralarger">
                Our blogs shares stories
        </div>
    <div class="row">
        @foreach ($blogpostcategories as $blogs)
  <div class="col-md-4">
        <img src="https://images.unsplash.com/photo-1508780709619-79562169bc64?auto=format&fit=crop&w=800&q=60" class="card-img-top blog-img" alt="Traveller">
        <div class="card-body px-0 mt-1">
          <small class="text-uppercase fw-semibold content-topheading">Traveller Blog</small>
          <h5 class="card-title fw-semibold mt-2 text-dark content-heading text-capitalize">{{ $blogs->title }}</h5>
          <p class="card-text text-muted mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($blogs->content), 150) }}</p>
          <a href="{{ route('SingleBlogpostcategory', $blogs->slug) }}" class="text-dark fw-semibold  text-decoration-none content-button">
            Read More <i class="bi bi-arrow-right"></i>
          </a>
        </div>
    </div>


        @endforeach
    </div>
</div>
</section>

<style>
    .ascent-flow .circle-img {
    position: relative;
    display: inline-block;
    background: radial-gradient(circle at center, #fff 50%, #f8dcdc 51%);
    border-radius: 50%;
    padding: 10px;
    border: 2px dashed #b40000;
    width: 220px;
    height: 220px;
    overflow: hidden;
}

.ascent-flow .circle-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.central-logo img {
    width: 200px;
    height: 200px;
    object-fit: contain;
}

.label-tag {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%);
    background: #b40000;
    color: #fff;
    padding: 6px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.label-tag::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -12px;
    width: 6px;
    height: 6px;
    background: #b40000;
    border-radius: 50%;
    transform: translateY(-50%);
    animation: pulse 1s infinite;
}

.label-info {
    position: absolute;
    top: -10px;
    left: 0;
    background: #fff;
    padding: 3px 10px;
    font-size: 12px;
    font-weight: 500;
    color: #b40000;
    border: 1px dashed #b40000;
    border-radius: 20px;
}

.flow-caption {
    font-weight: 600;
    font-size: 18px;
}

@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.4); opacity: 0.6; }
    100% { transform: scale(1); opacity: 1; }
}

@media (max-width: 768px) {
    .central-logo img {
        width: 150px;
        height: 150px;
    }
    .ascent-flow .circle-img {
        width: 160px;
        height: 160px;
    }
    .label-tag {
        font-size: 12px;
        padding: 4px 10px;
    }
}

</style>

<section class="ascent-flow my-5">
    <div class="container text-center">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/first.avif') }}" class="img-fluid" alt="New Customer">
                    <div class="label-tag red">Active</div>
                
                </div>
                <p class="flow-caption mt-3">Hope for Digital world</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="central-logo">
                    <img src="{{ asset('image/logo.avif') }}" class="img-fluid" alt="Aide Ascent">
                </div>
            </div>

            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/digital.avif') }}" class="img-fluid rounded-circle" alt="Operations">
                    <div class="label-tag red">Need</div>
                
                </div>
                <p class="flow-caption mt-3">Empower Young Lives</p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4 position-relative">
                <div class="circle-img">
                    <img src="{{ asset('image/ch.avif') }}" class="img-fluid rounded-circle" alt="Loyal Customer">
                    <div class="label-tag red">On time</div>
                    
                </div>
                <p class="flow-caption mt-3">Growing with Grace</p>
            </div>
        </div>
    </div>
</section>

@endsection



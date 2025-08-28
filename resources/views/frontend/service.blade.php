@extends('frontend.layouts.master')

@section('content')
    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/service.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Our Service</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Service
                </p>
            </div>
        </div>
    </section>
    <section class="sample_page py-5 bg-white">
        <div class="container">
            <div class="row gx-5 gy-1">
                <div class="col-md-9">
                {{-- Main Image --}}
                <div class="col-lg-12 col-md-12 col-sm-12 order-1 order-md-1">
                    <div class="overflow-hidden rounded shadow-lg mb-3" style="border: 1px solid #ddd;">
                        <img src="{{ asset('uploads/service/' . $service->image) }}" alt="{{ $service->title }}"
                            class="img-fluid w-100"
                            style="object-fit: cover; max-height: 420px; transition: transform 0.4s ease;">
                    </div>
                </div>
                {{-- Content --}}
                <div class="col-lg-12 col-md-12 col-sm-12 order-2 order-md-3 ">
                    <h2 class=" pb-2 m-0 fw-bold">{{ $service->title }}</h2>
                    <div class="text-secondary xs-text-des" style=" letter-spacing: 0.01em;">
                        <p class="contentdesc  mx-2">
                            {!! str_replace('&nbsp;', ' ', $service->description) !!}
                        </p>
                    </div>
                </div>
                </div>
                <style>
                    .asidebar{
                        position:absolute;
                        right:25px;
                        min-height:80vh;
                    }
                </style>

                 <aside class="col-lg-3 col-md-3 col-sm-12 order-3 order-md-2 p-4 bg-light rounded shadow-sm border asidebar">
                <h4 class="mb-4 border-bottom pb-2 text-secondary">Special Offer</h4>
                <ul class="list-unstyled">
                    @foreach ($services  as $blog)
                        <li class="mb-3">
                            <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}" 
                               class="fw-bold content-heading">
                                {{ app()->getLocale() === 'ne' ? $blog->title_ne : $blog->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

            </div>
        </div>
    </section>

    <script>
        // Optional: subtle zoom effect on main image hover
        document.querySelectorAll('.overflow-hidden img').forEach(img => {
            img.addEventListener('mouseenter', () => img.style.transform = 'scale(1.05)');
            img.addEventListener('mouseleave', () => img.style.transform = 'scale(1)');
        });
    </script>
@endsection
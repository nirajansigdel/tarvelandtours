@extends('frontend.layouts.master')

<style>
    .why-usimage {
        height:60vh;
        width: 100%;
        object-fit: cover;
    }
</style>

@section('content')

<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/gallery.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">why us</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    why us
                </p>
            </div>
        </div>
    </section>
<section class="container-fluid py-5">
    <div class="container">
          <h2 class="extarlarge text-center mb-5">Why Trekking Nepal?</h2>
        @forelse($whyUsData as $why)
            <div class="row gx-5 mt-5">
                <div class="col-md-12">
                    <h2 class="extralarge">{{ $why->heading }}</h2>

                    <!-- @if(!empty($why->subtitle))
                        <h3 class="mb-3 text-center">{{ $why->subtitle }}</h3>
                    @endif -->

                    <p class="text-gray content-desc">
                        {{ $why->content }}
                    </p>

                    @if(!empty($why->image))
                        <div class="text-center mt-4">
                            <img 
                                src="{{ asset('uploads/whyus/' . $why->image) }}" 
                                alt="{{ $why->heading }} image" 
                                class="why-usimage rounded " 
                                loading="lazy"
                            >
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>No data available at the moment.</p>
                </div>
            </div>
        @endforelse
    </div>
</section>



       


@endsection

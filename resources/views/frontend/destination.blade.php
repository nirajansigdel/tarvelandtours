@extends('frontend.layouts.master')

@section('content')
<div class="content-wrapper">

    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/destin.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Destinations</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Destinations
                </p>
            </div>
        </div>
    </section>

    <div class="container pt-8 pb-8">
        <div class="row">
           <div class="directors-header my-5 text-center">
            <h1 class="heading mb-1"> Beautiful Destination</h1>
            <p class="extralarger">
                Where the map ends, your story begins.</p>
        </div>
        </div>

        @if($products->isEmpty())
            <div class="row">
                <div class="col-12 text-center">
                    <div class="alert alert-info">
                        <h4>No destinations available yet.</h4>
                        <p>Please check back later for new destinations.</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if(is_array($product->images) && count($product->images))
                                <img src="{{ asset('uploads/products/' . $product->images[0]) }}" class="card-img-top"
                                    alt="{{ $product->heading ?? 'Destination Image' }}" style="height: 200px; object-fit: cover;">
                            @else
                                <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60"
                                    class="card-img-top" alt="Default Image" style="height: 200px; object-fit: cover;">
                            @endif

                            <div class="card-body">
                                <div class="d-flex">
                                    @if($product->date)
                                        <div class="col-md-12">
                                            <small class="text-muted">
                                                <i class="fas fa-calendar"></i> <span class="px-1">{{ $product->date }}</span>
                                            </small>
                                        </div>
                                    @endif
                                </div>
                                <h5 class="content-heading mt-2">{{ $product->heading ?? 'Untitled Destination' }}</h5>
                                @if($product->subtitle)
                                    <p class="contentdesc text-muted">{{ Str::limit($product->subtitle, 100) }}</p>
                                @endif
                                <p class="p-0 m-0 xs-text-des">
                                    {!! Str::limit($product->content, 200) !!}
                                </p>

                                @if($product->original_price || $product->discounted_price)
                                    <div class="mt-3">
                                        <h6 class=" mb-2">Package Price:</h6>
                                        @if($product->original_price && $product->discounted_price)
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <span class="text-decoration-line-through text-muted" style="font-size: 0.9rem;">
                                                    NPR {{ number_format($product->original_price) }}
                                                </span>
                                                <span class="fw-bold ">
                                                    NPR {{ number_format($product->discounted_price) }}
                                                </span>
                                            </div>
                                        @elseif($product->discounted_price)
                                            <span class="fw-bold text-success">
                                                NPR {{ number_format($product->discounted_price) }}
                                            </span>
                                        @elseif($product->original_price)
                                            <span class="fw-bold">
                                                NPR {{ number_format($product->original_price) }}
                                            </span>
                                        @endif
                                    </div>
                                @endif

                            </div>
                            <div class="card-footer bg-transparent d-flex justify-content-between p-0 m-0 ">
                                <a href="{{ route('products.detail', $product->id) }}"
                                    class="col-md-5 btn text-dark fw-semibold  text-decoration-none content-button">
                                    View Details <i class="bi bi-arrow-right"></i>
                                </a>
                                @if($product->location)
                                    <div class="col-3 flex-end mt-2">
                                        <small class="text-bold">
                                            <i class="fas fa-map-marker-alt"></i> <span
                                                class="contentdesc">{{ $product->location }}</span>
                                        </small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            @if($products->hasPages())
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex justify-content-center">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            @endif
        @endif

        <!-- Add extra spacing at the bottom -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="text-center text-muted">
                    <hr class="my-4">
                    <p class="mb-0">Discover amazing destinations and plan your next adventure</p>
                </div>
            </div>
        </div>

        <!-- Footer spacer to ensure proper separation -->
        <div class="footer-spacer"></div>
    </div>
</div>
@endsection
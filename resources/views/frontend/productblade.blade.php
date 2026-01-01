@extends('frontend.layouts.master')

@section('content')
    @php
        // Get the first product type for dynamic content
        $productType = is_array($product->product_types) && count($product->product_types) > 0 ? $product->product_types[0] : 'General';
        
        // Define dynamic content based on product type
        $heroContent = [
            'Post' => [
                'title' => 'Our Travel Posts',
                'breadcrumb' => 'Posts',
                'bg_image' => 'image/blog.webp'
            ],
            'Destination' => [
                'title' => 'Our Destinations',
                'breadcrumb' => 'Destinations',
                'bg_image' => 'image/destin.jpg'
            ],
            'Festival' => [
                'title' => 'Our Festivals',
                'breadcrumb' => 'Festivals',
                'bg_image' => 'image/events.jpg'
            ],
            'Couple' => [
                'title' => 'Our Couple Packages',
                'breadcrumb' => 'Couple Packages',
                'bg_image' => 'image/um.jpg'
            ],
            'Group' => [
                'title' => 'Our Group Tours',
                'breadcrumb' => 'Group Tours',
                'bg_image' => 'image/gallary.jpg'
            ],
            'General' => [
                'title' => 'Our Products',
                'breadcrumb' => 'Products',
                'bg_image' => 'image/service.jpg'
            ]
        ];
        
        $currentHero = $heroContent[$productType] ?? $heroContent['General'];
        
        // Check if product has a custom hero image field (you can add this to your products table later)
        $customHeroImage = $product->hero_image ?? null;
        $finalBgImage = $customHeroImage ? asset('uploads/hero/' . $customHeroImage) : asset($currentHero['bg_image']);
    @endphp

    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/gallery.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">{{ $currentHero['title'] }}</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ $currentHero['breadcrumb'] }}
                </p>
            </div>
        </div>
    </section>



    <!-- Product Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Product Image & Gallery -->
                <div class="col-md-8">
                    <div class="mb-4 position-relative">
                        @if(is_array($product->images) && count($product->images))
                            <img id="mainProductImage" data-index="0"
                                src="{{ asset('uploads/products/' . $product->images[0]) }}"
                                class="img-fluid rounded shadow"
                                alt="{{ $product->heading ?? 'Product Image' }}"
                                style="width: 100%; height: 400px; object-fit: cover;">
                            
                            @if(count($product->images) > 1)
                                <div class="mt-3 d-flex flex-wrap align-items-center gap-2">
                                    @foreach($product->images as $idx => $gimg)
                                        <button type="button"
                                            class="thumb-btn"
                                            data-index="{{ $idx }}"
                                            data-src="{{ asset('uploads/products/' . $gimg) }}"
                                            aria-label="Show image {{ $idx + 1 }}">
                                            <img src="{{ asset('uploads/products/' . $gimg) }}"
                                                class="thumb-img" alt="Gallery Image {{ $idx + 1 }}">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        @else
                            <img id="mainProductImage"
                                src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60"
                                class="img-fluid rounded shadow" alt="Default Product Image"
                                style="width: 100%; height: 400px; object-fit: cover;">
                        @endif

                        <!-- Price Box (Overlayed Right) -->
                        @if($product->original_price || $product->discounted_price)
                            <div class="position-absolute top-0 end-0  bg-light border rounded shadow-sm p-3 "
                                style="width:230px; z-index: 2;">
                                <h6 class="fw-bold mb-2">Package Price:</h6>
                                @if($product->original_price && $product->discounted_price)
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <span class="text-decoration-line-through text-muted" style="font-size: 0.9rem;">
                                            $ {{ number_format($product->original_price) }}
                                        </span>
                                        <span class="fw-bold">
                                            $ {{ number_format($product->discounted_price) }}
                                        </span>
                                    </div>
                                @elseif($product->discounted_price)
                                    <span class="fw-bold text-success">
                                        $ {{ number_format($product->discounted_price) }}
                                    </span>
                                @elseif($product->original_price)
                                    <span class="fw-bold">
                                        $ {{ number_format($product->original_price) }}
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>


                    <div class="ps-lg-2">
                        <!-- Title & Subtitle -->
                        <div class="mb-4">
                            <h2 class="fw-bold  text-dark">{{ $product->getTranslated('heading') }}</h2>
                            @if($product->getTranslated('subtitle'))
                                <h6 class="fs-5 text-muted">{{ $product->getTranslated('subtitle') }}</h6>
                            @endif
                        </div>

                        <!-- Info Grid -->
                        <div class="row g-3 mb-4">
                            @if($product->date)
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-calendar-alt me-2 fs-5 text-primary"></i>
                                        <strong>Date:</strong>&nbsp;{{ $product->date->format('M d, Y') }}
                                    </div>
                                </div>
                            @endif

                            @if($product->duration)
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-clock me-2 fs-5 text-info"></i>
                                        <strong>Duration:</strong>&nbsp;{{ $product->duration }}
                                    </div>
                                </div>
                            @endif

                            @if($product->people)
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-users me-2 fs-5 text-secondary"></i>
                                        <strong>People:</strong>&nbsp;{{ $product->people }}
                                    </div>
                                </div>
                            @endif

                            @if($product->getTranslated('location'))
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-map-marker-alt me-2 fs-5 text-danger"></i>
                                        <strong>Location:</strong>&nbsp;{{ $product->getTranslated('location') }}
                                    </div>
                                </div>
                            @endif

                            @if($product->getTranslated('package'))
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-box me-2 fs-5 text-warning"></i>
                                        <strong>Package:</strong>&nbsp;{{ $product->getTranslated('package') }}
                                    </div>
                                </div>
                            @endif

                            @if($product->getTranslated('transportation'))
                                <div class="col-sm-6 col-md-4">
                                    <div class="d-flex align-items-center text-muted small">
                                        <i class="fas fa-car me-2 fs-5 text-success"></i>
                                        <strong>Transport:</strong>&nbsp;{{ $product->getTranslated('transportation') }}
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Description -->
                        @if($product->getTranslated('content'))
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">Description</h5>
                                <p class="text-muted lh-lg fs-6">
                                    {!! $product->getTranslated('content') !!}
                                </p>
                            </div>
                        @endif

                         @php
                            $includes = $product->getTranslated('includes', app()->getLocale());
                            if (!is_array($includes)) {
                                $includes = $product->includes ?? [];
                            }
                        @endphp
                        @if($includes && is_array($includes) && count($includes))
                            <div class="mb-4">
                                <h5 class="fw-bold mb-3">What's Included</h5>
                                <div class="row">
                                    @foreach($includes as $include)
                                        @if(trim($include))
                                            <div class="col-md-12 mb-2">
                                                <div class="">
                                                    <i class="fas fa-check-circle text-success me-2"></i>
                                                    <span class="text-muted">{{ $include }}</span>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endif


                        <!-- Action Buttons -->
                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('apply', $product->id) }}" class="cta-button btn btn-primary px-5">
                                <i class="fas fa-paper-plane me-2"></i>Book Your Seat
                            </a>
                            <a href="{{ route('products.index.front') }}"
                                class="btn  btn-outline-secondary btn-lg px-4 rounded-pill">
                                <i class="fas fa-arrow-left me-2"></i>Back to Products
                            </a>
                        </div>
                    </div>
                </div>
               <div class="col-md-4">
    <div class="bg-light rounded shadow-sm p-3 h-100 position-sticky" style="top: 100px;">
        <h5 class="bg-dark text-white py-2 px-3 rounded ">Related Offer</h5>

        @foreach($relatedProducts as $relatedProduct)
            <div class="card mb-3 border-0 shadow-sm rounded-3 hover-shadow transition">
                <div class="card-body p-2">
                    @if(is_array($relatedProduct->images) && count($relatedProduct->images))
                        <img src="{{ asset('uploads/products/' . $relatedProduct->images[0]) }}"
                             class="img-fluid rounded mb-2 productimage" alt="Related Product Image">
                    @endif

                    <h6 class="fw-bold mb-2">{{ Str::limit($relatedProduct->getTranslated('heading'), 50) }}</h6>

                    @if($relatedProduct->getTranslated('subtitle'))
                        <p class="text-muted mb-3 small">{{ Str::limit($relatedProduct->getTranslated('subtitle'), 80) }}</p>
                    @endif

                    <a href="{{ route('products.detail', $relatedProduct->id) }}"
                       class="btn btn-sm btn-outline-secondary">
                        Read More <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>




            </div>
        </div>
    </section>

    <style>
        .thumb-btn {
            width:90px;
            height:90px;
            padding: 0;
            border: 2px solid transparent;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 2px 6px rgba(0,0,0,.06);
            transition: all .2s ease-in-out;
        }
        .thumb-btn:hover { transform: translateY(-1px); }
        .thumb-btn.active, .thumb-btn:focus { border-color: #0d6efd; outline: none; }
        .thumb-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.getElementById('mainProductImage');
            if (!mainImage) return;

            const buttons = document.querySelectorAll('.thumb-btn');
            if (!buttons.length) return;

            const setActive = (btn) => {
                buttons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            };

            buttons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const src = btn.getAttribute('data-src');
                    if (src) {
                        mainImage.src = src;
                        setActive(btn);
                    }
                });
            });

            // Initialize active state
            setActive(buttons[0]);
        });
    </script>

@endsection
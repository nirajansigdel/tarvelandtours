@extends('frontend.layouts.master')

@section('content')

<!-- Success and Error Alert Messages -->
@if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="container mt-3">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif



<!-- Product Details Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Product Image -->
            <div class="col-lg-6 mb-4">
                @if($product->image)
                    <img src="{{ asset('uploads/products/' . $product->image) }}" 
                         class="img-fluid rounded shadow" 
                         alt="{{ $product->heading ?? 'Product Image' }}"
                         style="width: 100%; height: 400px; object-fit: cover;">
                @else
                    <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" 
                         class="img-fluid rounded shadow" 
                         alt="Default Product Image"
                         style="width: 100%; height: 400px; object-fit: cover;">
                @endif
            </div>

            <!-- Product Information -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <h1 class="fw-bold mb-3 text-dark">{{ $product->heading }}</h1>
                    
                    @if($product->subtitle)
                        <h5 class="text-muted mb-4">{{ $product->subtitle }}</h5>
                    @endif

                    <!-- Product Details Grid -->
                    <div class="row g-3 mb-4">
                        @if($product->date)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar-alt text-primary me-2"></i>
                                    <span class="fw-medium">Date: {{ $product->date->format('M d, Y') }}</span>
                                </div>
                            </div>
                        @endif

                        @if($product->duration)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-clock text-primary me-2"></i>
                                    <span class="fw-medium">Duration: {{ $product->duration }}</span>
                                </div>
                            </div>
                        @endif

                        @if($product->people)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-users text-primary me-2"></i>
                                    <span class="fw-medium">People: {{ $product->people }}</span>
                                </div>
                            </div>
                        @endif

                        @if($product->location)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-map-marker-alt text-primary me-2"></i>
                                    <span class="fw-medium">Location: {{ $product->location }}</span>
                                </div>
                            </div>
                        @endif

                        @if($product->package)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-box text-primary me-2"></i>
                                    <span class="fw-medium">Package: {{ $product->package }}</span>
                                </div>
                            </div>
                        @endif

                        @if($product->transportation)
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-car text-primary me-2"></i>
                                    <span class="fw-medium">Transportation: {{ $product->transportation }}</span>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Product Types -->
                    @if($product->product_types)
                        <div class="mb-4">
                            <h6 class="fw-bold mb-2">Product Categories:</h6>
                            <div class="d-flex flex-wrap gap-2">
                                @php
                                    $productTypes = $product->product_types;
                                    if (is_string($productTypes)) {
                                        $productTypes = json_decode($productTypes, true) ?? [];
                                    }
                                    if (!is_array($productTypes)) {
                                        $productTypes = [];
                                    }
                                @endphp
                                @foreach($productTypes as $type)
                                    <span class="badge px-3 py-2" style="background-color: #495057; color: white; font-weight: bold;">{{ ucfirst(str_replace('_', ' ', $type)) }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Product Content -->
                    @if($product->content)
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Description:</h6>
                            <div class="text-muted lh-base">
                                {!! $product->content !!}
                            </div>
                        </div>
                    @endif

                    <!-- Pricing Information -->
                    @if($product->original_price || $product->discounted_price)
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3">Package Pricing:</h6>
                            <div class="pricing-card p-3 border rounded">
                                @if($product->original_price && $product->discounted_price)
                                    <div class="d-flex align-items-center gap-3 mb-2">
                                        <span class="text-decoration-line-through text-muted" style="font-size: 1.1rem;">
                                            NPR {{ number_format($product->original_price) }}
                                        </span>
                                        <span class="fw-bold text-success" style="font-size: 1.5rem;">
                                            NPR {{ number_format($product->discounted_price) }}
                                        </span>
                                    </div>
                                    <div class="text-success fw-bold">
                                        <i class="fas fa-percentage"></i> 
                                        {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}% OFF
                                    </div>
                                    <small class="text-muted">You save NPR {{ number_format($product->original_price - $product->discounted_price) }}</small>
                                @elseif($product->discounted_price)
                                    <span class="fw-bold text-success" style="font-size: 1.5rem;">
                                        NPR {{ number_format($product->discounted_price) }}
                                    </span>
                                @elseif($product->original_price)
                                    <span class="fw-bold text-primary" style="font-size: 1.5rem;">
                                        NPR {{ number_format($product->original_price) }}
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Apply Button -->
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="{{ route('apply', $product->id) }}" 
                           class="btn btn-primary btn-lg px-4 me-md-2">
                            <i class="fas fa-paper-plane me-2"></i>Apply Now
                        </a>
                        <a href="{{ route('products.index.front') }}" 
                           class="btn btn-outline-secondary btn-lg px-4">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products Section -->
@if($relatedProducts->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Related Products</h2>
            <p class="text-muted">Explore more products you might be interested in</p>
        </div>

        <div class="row g-4">
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">

                        
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ Str::limit($relatedProduct->heading, 50) }}</h5>
                            @if($relatedProduct->subtitle)
                                <p class="card-text text-muted">{{ Str::limit($relatedProduct->subtitle, 80) }}</p>
                            @endif
                            
                            <!-- Product Types Badges -->
                            @if($relatedProduct->product_types)
                                <div class="mb-3">
                                    @php
                                        $relatedProductTypes = $relatedProduct->product_types;
                                        if (is_string($relatedProductTypes)) {
                                            $relatedProductTypes = json_decode($relatedProductTypes, true) ?? [];
                                        }
                                        if (!is_array($relatedProductTypes)) {
                                            $relatedProductTypes = [];
                                        }
                                    @endphp
                                    @foreach(array_slice($relatedProductTypes, 0, 2) as $type)
                                        <span class="badge bg-light text-dark me-1">{{ ucfirst(str_replace('_', ' ', $type)) }}</span>
                                    @endforeach
                                    @if(count($relatedProductTypes) > 2)
                                        <span class="badge bg-light text-dark">+{{ count($relatedProductTypes) - 2 }} more</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                        
                        <div class="card-footer bg-transparent border-0">
                            <a href="{{ route('products.detail', $relatedProduct->id) }}" 
                               class="btn btn-outline-primary w-100">
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

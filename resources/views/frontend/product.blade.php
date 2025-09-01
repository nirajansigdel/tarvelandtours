@extends('frontend.layouts.master')

@section('content')
<div class="container pt-8">
    <div class="row">
        <div class="col-12">
            @if(isset($type) && $type)
                <h1 class="text-center mb-3">{{ $type }} Products</h1>
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('products.index.front') }}">All Products</a></li>
                        <li class="breadcrumb-item active">{{ $type }}</li>
                    </ol>
                </nav>
            @else
                <h1 class="text-center mb-5">Our Products</h1>
            @endif
        </div>
    </div>

    @if($products->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    @if(isset($type) && $type)
                        <h4>No {{ $type }} products available yet.</h4>
                        <p>We don't have any products in the {{ $type }} category at the moment. Please check back later or browse other categories.</p>
                        <a href="{{ route('products.index.front') }}" class="btn btn-primary mt-2">View All Products</a>
                    @else
                        <h4>No products available yet.</h4>
                        <p>Please check back later for our latest offerings.</p>
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <!-- Product Image -->
                        @if($product->image)
                            <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $product->heading ?? 'Product Image' }}"
                                 style="height: 200px; object-fit: cover;">
                        @else
                            <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" 
                                 class="card-img-top" 
                                 alt="Default Product Image"
                                 style="height: 200px; object-fit: cover;">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->heading ?? 'Untitled Product' }}</h5>
                            @if($product->subtitle)
                                <p class="card-text text-muted">{{ Str::limit($product->subtitle, 100) }}</p>
                            @endif
                            
                            <div class="row mb-2">
                                @if($product->location)
                                    <div class="col-6">
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt"></i> {{ $product->location }}
                                        </small>
                                    </div>
                                @endif
                                @if($product->date)
                                    <div class="col-6">
                                        <small class="text-muted">
                                            <i class="fas fa-calendar"></i> {{ $product->date }}
                                        </small>
                                    </div>
                                @endif
                            </div>
                            
                                                         @if($product->package)
                                 <p class="card-text">
                                     <strong>Package:</strong> {{ Str::limit($product->package, 80) }}
                                 </p>
                             @endif
                             
                             {{-- Display Selected Categories --}}
                             @if($product->product_types && is_array($product->product_types) && count($product->product_types) > 0)
                                 <div class="mt-2">
                                     <strong>Categories:</strong>
                                     <div class="mt-1">
                                         @foreach($product->product_types as $categoryType)
                                             @php
                                                 $categoryLabels = [
                                                     'Post' => 'Post',
                                                     'Destination' => 'Destination', 
                                                     'General' => 'General',
                                                     'Festival' => 'Festival',
                                                     'Couple' => 'Couple',
                                                     'Group' => 'Group'
                                                 ];
                                                 $label = $categoryLabels[$categoryType] ?? ucfirst(str_replace('_', ' ', $categoryType));
                                             @endphp
                                             <span class="badge me-1 mb-1" style="background-color: #495057; color: white; font-weight: bold;">{{ $label }}</span>
                                         @endforeach
                                     </div>
                                 </div>
                             @endif
                            
                            {{-- Pricing Information --}}
                            @if($product->original_price || $product->discounted_price)
                                <div class="mt-3">
                                    <h6 class="text-primary mb-2">Package Price:</h6>
                                    @if($product->original_price && $product->discounted_price)
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <span class="text-decoration-line-through text-muted" style="font-size: 0.9rem;">
                                                NPR {{ number_format($product->original_price) }}
                                            </span>
                                            <span class="fw-bold text-success" style="font-size: 1.1rem;">
                                                NPR {{ number_format($product->discounted_price) }}
                                            </span>
                                        </div>
                                        <small class="text-success">
                                            <i class="fas fa-percentage"></i> 
                                            {{ round((($product->original_price - $product->discounted_price) / $product->original_price) * 100) }}% OFF
                                        </small>
                                    @elseif($product->discounted_price)
                                        <span class="fw-bold text-success" style="font-size: 1.1rem;">
                                            NPR {{ number_format($product->discounted_price) }}
                                        </span>
                                    @elseif($product->original_price)
                                        <span class="fw-bold text-primary" style="font-size: 1.1rem;">
                                            NPR {{ number_format($product->original_price) }}
                                        </span>
                                    @endif
                                </div>
                            @endif
                            
                        </div>
                        <div class="card-footer bg-transparent">
                            <a href="{{ route('products.detail', $product->id) }}" 
                               class="btn btn-primary btn-sm">
                                View Details
                            </a>
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
</div>
@endsection

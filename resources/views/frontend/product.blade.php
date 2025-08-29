@extends('frontend.layouts.master')

@section('content')
<div class="container pt-8">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mb-5">Our Products</h1>
        </div>
    </div>

    @if($products->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <div class="alert alert-info">
                    <h4>No products available yet.</h4>
                    <p>Please check back later for our latest offerings.</p>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        @if($product->image)
                            <img src="{{ asset('uploads/products/' . $product->image) }}" 
                                 class="card-img-top" 
                                 alt="{{ $product->heading }}"
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
                                         @foreach($product->product_types as $type)
                                             @php
                                                 $categoryLabels = [
                                                     'cyc' => 'Post',
                                                     'nsep' => 'Destination', 
                                                     'frp' => 'General',
                                                     'community_empowerment' => 'Festival',
                                                     'bamboo_project' => 'Couple',
                                                     'child_care_home' => 'Group'
                                                 ];
                                                 $label = $categoryLabels[$type] ?? ucfirst(str_replace('_', ' ', $type));
                                             @endphp
                                             <span class="badge bg-primary me-1 mb-1">{{ $label }}</span>
                                         @endforeach
                                     </div>
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

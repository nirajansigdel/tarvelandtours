{{-- Create this file: resources/views/products/layouts/productblade.blade.php --}}

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $product->heading ?? 'Product Details' }}</h2>
                </div>
                <div class="card-body">
                    @if($product->image)
                        <img src="{{ asset('uploads/products/' . $product->image) }}" 
                             alt="{{ $product->heading }}" 
                             class="img-fluid mb-3">
                    @endif
                    
                    @if($product->subtitle)
                        <h4 class="text-muted mb-3">{{ $product->subtitle }}</h4>
                    @endif
                    
                    <div class="row mb-3">
                        @if($product->country)
                            <div class="col-md-6">
                                <strong>Country:</strong> {{ $product->country->name }}
                            </div>
                        @endif
                        
                        @if($product->vacancy)
                            <div class="col-md-6">
                                <strong>Vacancy:</strong> {{ $product->vacancy }}
                            </div>
                        @endif
                    </div>
                    
                    @if($product->from_date || $product->to_date)
                        <div class="row mb-3">
                            @if($product->from_date)
                                <div class="col-md-6">
                                    <strong>From Date:</strong> {{ $product->from_date->format('M d, Y') }}
                                </div>
                            @endif
                            
                            @if($product->to_date)
                                <div class="col-md-6">
                                    <strong>To Date:</strong> {{ $product->to_date->format('M d, Y') }}
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    @if($product->number_of_people_required)
                        <div class="mb-3">
                            <strong>Number of People Required:</strong> {{ $product->number_of_people_required }}
                        </div>
                    @endif
                    
                    <div class="content">
                        {!! $product->content !!}
                    </div>
                    
                    @if($product->product_types && is_array($product->product_types))
                        <div class="mt-3">
                            <strong>Product Types:</strong>
                            @foreach($product->product_types as $type)
                                <span class="badge bg-primary me-1">{{ ucfirst(str_replace('_', ' ', $type)) }}</span>
                            @endforeach
                        </div>
                    @elseif($product->type)
                        <div class="mt-3">
                            <strong>Product Type:</strong>
                            <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $product->type)) }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            @if($relatedProducts->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h5>Related Products</h5>
                    </div>
                    <div class="card-body">
                        @foreach($relatedProducts as $related)
                            <div class="mb-3 pb-3 border-bottom">
                                @if($related->image)
                                    <img src="{{ asset('uploads/products/' . $related->image) }}" 
                                         alt="{{ $related->heading }}" 
                                         class="img-thumbnail mb-2" 
                                         style="height: 60px; width: 60px; object-fit: cover;">
                                @endif
                                <h6>
                                    <a href="{{ route('products.detail', $related->id) }}" class="text-decoration-none">
                                        {{ $related->heading ?? 'Untitled' }}
                                    </a>
                                </h6>
                                @if($related->subtitle)
                                    <p class="text-muted small">{{ Str::limit($related->subtitle, 100) }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

</div>
@endsection



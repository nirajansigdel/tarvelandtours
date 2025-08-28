{{-- Create this file: resources/views/demands/detail.blade.php --}}

@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>{{ $demand->heading ?? 'Demand Details' }}</h2>
                </div>
                <div class="card-body">
                    @if($demand->image)
                        <img src="{{ asset('uploads/demands/' . $demand->image) }}" 
                             alt="{{ $demand->heading }}" 
                             class="img-fluid mb-3">
                    @endif
                    
                    @if($demand->subtitle)
                        <h4 class="text-muted mb-3">{{ $demand->subtitle }}</h4>
                    @endif
                    
                    <div class="row mb-3">
                        @if($demand->country)
                            <div class="col-md-6">
                                <strong>Country:</strong> {{ $demand->country->name }}
                            </div>
                        @endif
                        
                        @if($demand->vacancy)
                            <div class="col-md-6">
                                <strong>Vacancy:</strong> {{ $demand->vacancy }}
                            </div>
                        @endif
                    </div>
                    
                    @if($demand->from_date || $demand->to_date)
                        <div class="row mb-3">
                            @if($demand->from_date)
                                <div class="col-md-6">
                                    <strong>From Date:</strong> {{ $demand->from_date->format('M d, Y') }}
                                </div>
                            @endif
                            
                            @if($demand->to_date)
                                <div class="col-md-6">
                                    <strong>To Date:</strong> {{ $demand->to_date->format('M d, Y') }}
                                </div>
                            @endif
                        </div>
                    @endif
                    
                    @if($demand->number_of_people_required)
                        <div class="mb-3">
                            <strong>Number of People Required:</strong> {{ $demand->number_of_people_required }}
                        </div>
                    @endif
                    
                    <div class="content">
                        {!! $demand->content !!}
                    </div>
                    
                    @if($demand->demand_types && is_array($demand->demand_types))
                        <div class="mt-3">
                            <strong>Project Types:</strong>
                            @foreach($demand->demand_types as $type)
                                <span class="badge bg-primary me-1">{{ ucfirst(str_replace('_', ' ', $type)) }}</span>
                            @endforeach
                        </div>
                    @elseif($demand->type)
                        <div class="mt-3">
                            <strong>Project Type:</strong>
                            <span class="badge bg-primary">{{ ucfirst(str_replace('_', ' ', $demand->type)) }}</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            @if($relatedDemands->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h5>Related Demands</h5>
                    </div>
                    <div class="card-body">
                        @foreach($relatedDemands as $related)
                            <div class="mb-3 pb-3 border-bottom">
                                @if($related->image)
                                    <img src="{{ asset('uploads/demands/' . $related->image) }}" 
                                         alt="{{ $related->heading }}" 
                                         class="img-thumbnail mb-2" 
                                         style="height: 60px; width: 60px; object-fit: cover;">
                                @endif
                                <h6>
                                    <a href="{{ route('demands.detail', $related->id) }}" class="text-decoration-none">
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
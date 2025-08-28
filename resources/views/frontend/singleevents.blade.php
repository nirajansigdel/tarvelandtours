@extends('frontend.layouts.master')

@section('content')


<!-- ======= Single Event Section ======= -->
<section class="container-fluid bg-light py-5">
    <div class="container">
        
        <div class="row">
            <!-- Main Event Content -->
            <div class="col-lg-12">
                <div class="">
                    <div class="card-body p-4">
                        @if($event->image)
                            <div class="text-center mb-4">
                                <img src="{{ asset('uploads/events/' . $event->image) }}" 
                                     alt="{{ $event->heading }}" 
                                     class="img-fluid rounded" 
                                     style="max-height: 400px; width: 100%; object-fit: cover;">
                            </div>
                        @endif
                        
                        <h1 class="mb-3 text-primary">{{ $event->heading }}</h1>
                        
                        
                        <div class="event-content">
                            {!! $event->content !!}
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar -->
           
        </div>
    </div>
</section>

<style>
.hero {
    position: relative;
    height: 300px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hero img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(0.6);
}

.hero-title {
    position: relative;
    z-index: 2;
    color: white;
    font-size: 3rem;
    font-weight: bold;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.7);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.event-meta {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #007bff;
}

.event-content {
    line-height: 1.8;
    font-size: 1.1rem;
}

.event-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1rem 0;
}

.related-event {
    transition: transform 0.2s, box-shadow 0.2s;
}

.related-event:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}

.card {
    border: none;
    border-radius: 12px;
}

.card-header {
    border-radius: 12px 12px 0 0 !important;
    border: none;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2rem;
    }
    
    .event-content {
        font-size: 1rem;
    }
}
</style>

@endsection
@extends('frontend.layouts.master')
@section('content')
   <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/q.avif') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Find ur Jobs</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Career
                </p>
            </div>
        </div>
    </section>
    <div class="container">
        <h1 class="text-center mt-5">Career Opportunities</h1>
        <p class="text-center mb-5">Join us in making a difference in the community. Your time and skills can help us
            achieve our mission.</p>

        @if($careers && $careers->count() > 0)
            @php
                $career = $careers->first();
            @endphp

            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card shadow-sm border-0 mb-4">

                        @if($career->image)
                            <img src="{{ asset('uploads/careers/' . $career->image) }}" alt="{{ $career->title }}"
                                class="card-img-top img-fluid rounded-top" style="object-fit: cover; max-height:300px;">
                        @else
                            <div class="text-center text-muted py-5">
                                <i class="fas fa-image fa-3x mb-2"></i>
                                <p>No image available</p>
                            </div>
                        @endif

                        <div class="card-body">
    <h3 class="fw-bold mb-4" style="border-left: 6px solid #0d6efd; padding-left: 15px; font-size: 1.75rem;">
        {{ $career->title }}
    </h3>

    <ul class="list-unstyled mb-3">
        <li><strong>Location:</strong> {{ $career->location }}</li>
        <li><strong>Date:</strong> {{ $career->formatted_date }}</li>
        <li><strong>Time:</strong> {{ $career->time }}</li>
        <li><strong>Spots Available:</strong> {{ $career->spots_available }}</li>
        @if($career->salary)
            <li><strong>Salary:</strong> {{ $career->salary }}</li>
        @endif
    </ul>

    <p class="card-text">{{ $career->description }}</p>

    <p><strong>Requirements:</strong> <span class="card-text">{{ $career->requirements }}</span></p>

    <div class="mt-4 text-end">
        <a href="{{ route('applycareer') }}" class="btn btn-success px-4">Apply Now</a>
        <a href="/" class="btn btn-outline-secondary ms-2 my-2">Back to home</a>
    </div>
</div>

                    </div>
                </div>
            </div>

        @else
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8">
                    <div class="card shadow-sm border-0 mb-4">
                        <div class="card-body text-center">
                            <div class="mb-3">
                                <i class="fas fa-briefcase fa-3x text-muted"></i>
                            </div>
                            <h5 class="text-muted">No Career Opportunities Available</h5>
                            <p class="text-muted">Please check back later for new opportunities.</p>
                            <a href="/" class="btn btn-outline-secondary">Back to home</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
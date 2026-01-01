@extends('frontend.layouts.master')



<head>
    <title>{{ $gallerymeta?->title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $gallerymeta?->description ?? '' }}">

</head>

@section('content')


<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/check.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">{{ __('messages.gallery_h1') }}</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">{{ __('messages.Home') }}</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ __('messages.gallery') }}
                </p>
            </div>
        </div>
    </section>


<section class="gallery-section">
    <div class="container">
        <div class=" text-center gap-1">
            <p class="heading">{{ __('messages.photogallery') }}</p>
            <p class="extralarger">{{ __('messages.gallery_sub') }}</p>
        </div>

        <div class="filter-container mt-4">
            <div class="btn-group">
                <button id="imageButton" class="active">{{ __('messages.photo') }}</button>
                <button id="videoButton">{{ __('messages.video') }}</button>
            </div>
        </div>

        <div id="imageContent" class="gallery-wrapper">
            <div class="gallery-masonry">
                @foreach($images->sortByDesc('updated_at') as $image)
                    <div class="gallery-item" data-category="{{ $image->category->slug ?? 'uncategorized' }}">
                        <div class="gallery-inner">
                            @if(!empty($image->img) && is_array($image->img))
                                <img src="{{ asset(last($image->img)) }}" 
                                     alt="{{ $image->title }}"
                                     class="gallery-img">
                            @endif
                            <div class="gallery-content">
                                <h5 class="image-title text-white mb-3">{{ $image->title }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{ route('singleImage', $image->slug) }}" class="view-btn">
                                        View More Images →
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div id="videoContent" class="gallery-wrapper" style="display: none;">
            <div class="gallery-masonry">
                @forelse ($videos as $video)
                    <div class="gallery-item">
                        <div class="video-container">
                            <iframe class="youtube-player rounded" 
                                    width="100%" 
                                    height="280"
                                    src="https://www.youtube.com/embed/{{ $video->url }}" 
                                    title="{{ $video->title }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen 
                                    loading="lazy">
                            </iframe>
                        </div>
                        <div class="text-center mt-3">
                            <span class="sm-text-bd bluehighlight">
                                {{ $video->title ?? 'Untitled Video' }}
                            </span>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center">
                            <i class="fa fa-video-camera"></i>
                            No videos available at the moment.
                            Check back soon!
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const imageButton = document.getElementById('imageButton');
    const videoButton = document.getElementById('videoButton');
    const imageContent = document.getElementById('imageContent');
    const videoContent = document.getElementById('videoContent');

    function toggleContent(showImage) {
        imageContent.style.display = showImage ? 'block' : 'none';
        videoContent.style.display = showImage ? 'none' : 'block';
        imageButton.classList.toggle('active', showImage);
        videoButton.classList.toggle('active', !showImage);
    }

    // Set initial state
    toggleContent(true);

    // Add click event listeners
    imageButton.addEventListener('click', () => toggleContent(true));
    videoButton.addEventListener('click', () => toggleContent(false));

    // Lazy loading for YouTube videos
    document.querySelectorAll('.youtube-player').forEach(iframe => {
        const container = iframe.parentElement;
        container.classList.add('loading');

        iframe.addEventListener('load', () => container.classList.remove('loading'));
        iframe.addEventListener('error', () => {
            container.innerHTML = `
                <div class="alert alert-warning m-2">
                    <i class="fa fa-exclamation-triangle"></i> Video temporarily unavailable
                </div>
            `;
        });
    });
});
</script>














@endsection
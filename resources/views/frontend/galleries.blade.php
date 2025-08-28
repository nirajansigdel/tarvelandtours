@extends('frontend.layouts.master')
@section('content')

<style>
    .gallery-section {
        padding:50px 0;
        position: relative;
        overflow: hidden;
    }



    .gallery-wrapper {
        position: relative;
    }

    .gallery-masonry {
        display: flex;
        flex-wrap: wrap;
        margin: -10px;
    }

    .gallery-item {
        width: calc(33.333% - 20px);
        margin: 10px;
        position: relative;
        overflow: hidden;
        border-radius: 4px;
        transform-origin: center;
        transition: all 0.4s ease;
    }

    .gallery-item:nth-child(3n+1) {
        transform: rotate(-1deg);
    }

    .gallery-item:nth-child(3n+2) {
        transform: rotate(1deg);
    }

    .gallery-item:nth-child(3n+3) {
        transform: rotate(-0.5deg);
    }

    .gallery-item:hover {
        transform: rotate(0) scale(1.02);
        z-index: 2;
    }

    .gallery-img {
        width: 100%;
        height: 280px;
        object-fit: cover;
        transition: all 0.4s ease;
    }

    .gallery-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .view-btn {
        color: white;
        font-size: 14px;
        text-decoration: none;
        position: relative;
        padding-bottom: 2px;
    }

    .view-btn::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: white;
        transform: scaleX(0);
        transform-origin: right;
        transition: transform 0.3s ease;
    }

    .gallery-item:hover .gallery-content {
        transform: translateY(0);
    }

    .gallery-item:hover .view-btn::after {
        transform: scaleX(1);
        transform-origin: left;
    }

    /* Filter Buttons */
    .filter-container {
        margin-top: 0px;
        text-align: center;
        margin-bottom: 50px;
        position: relative;
    }

    .filter-container::before,
    .filter-container::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 100px;
        height: 1px;
        background: linear-gradient(to right, transparent, var(--primary), transparent);
    }

    .filter-container::before {
        left: calc(50% - 200px);
    }

    .filter-container::after {
        right: calc(50% - 200px);
    }

    .btn-group {
        display: inline-flex;
        background: white;
        padding: 6px;
        border-radius: 30px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        position: relative;
        z-index: 1;
    }

    .btn-group button {
        padding: 12px 30px;
        border: none;
        background: transparent;
        color: #555;
        font-size: 15px;
        font-weight: 600;
        border-radius: 25px;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
        letter-spacing: 0.5px;
    }

    .btn-group button:hover {
        color: var(--primary);
    }

    .btn-group button.active {
        background: var(--primary);
        color: white;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(var(--primary-rgb), 0.3);
    }

    .btn-group button:not(:last-child) {
        margin-right: 5px;
    }

    @media (max-width: 991px) {
        .gallery-item {
            width: calc(50% - 20px);
        }
    }

    @media (max-width: 576px) {
        .gallery-item {
            width: calc(100% - 20px);
        }
        
        .gallery-section {
            padding: 60px 0;
        }
    }

    .gallery-content .btn-primary {
        background: white;
        color: var(--primary);
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        font-weight: 600;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .gallery-content .btn-primary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .gallery-content .d-flex {
        gap: 15px;
    }
</style>

<!-- ======= Blog Hero Section ======= -->
<style>
  
</style>

<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/whyus.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Our Collection</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Gallery
                </p>
            </div>
        </div>
    </section>


<section class="gallery-section">
    <div class="container">
        <div class=" text-center gap-1">
            <h1 class="heading">Photo Gallery</h1>
            <p class="extralarger">Inspiring moments. United in community.</p>
        </div>

        <div class="filter-container mt-4">
            <div class="btn-group">
                <button id="imageButton" class="active">Images</button>
                <button id="videoButton">Videos</button>
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
<!-- === HERO SECTION START === -->

<style>
  /* === Hero Section === */
  .hero-section {
    position: relative;
    width: 100%;
    height: 112vh; /* Changed from 112vh to 100vh */
    overflow: hidden;
  }

  .carousel-item {
    display: flex !important;
    align-items: center;
    justify-content: center;
    height: 100vh; /* Match hero-section height */
    position: relative;
  }

  .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    animation: zoomEffect 20s ease-in-out infinite;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 1;
  }

  @keyframes zoomEffect {
    0% {
      transform: scale(1);
    }
    50% {
      transform: scale(1.05);
    }
    100% {
      transform: scale(1);
    }
  }

  .hero-content {
    position: relative;
    z-index: 2;
    color: white;
    padding: 2rem 1rem;
    text-align: center;
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
  }

  .hero-content h1.outline {
    font-size: 6rem;
    font-weight: 900;
    color: transparent;
    -webkit-text-stroke: 1px white;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .hero-content h1.solid {
    font-size: 5rem;
    font-weight: 900;
    color: white;
    text-transform: uppercase;
    margin-top: -1rem;
  }

  .hero-content p {
    font-size: 1.2rem;
    margin: 1rem auto 2rem;
    color: #eee;
  }

  .hero-content .btn {
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
  }

  .carousel-indicators {
    bottom: 20px;
    justify-content: center;
  }

  .carousel-indicators [data-bs-target] {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #fff;
    opacity: 0.4;
    transition: opacity 0.3s;
  }

  .carousel-indicators .active {
    opacity: 1;
  }

  .carousel-control-prev,
  .carousel-control-next {
    display: none;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .hero-content h1.outline {
      font-size: 2.5rem;
      -webkit-text-stroke: 1px white;
    }

    .hero-content h1.solid {
      font-size: 2rem;
    }

    .hero-content p {
      font-size: 1rem;
    }
  }
</style>

<section class="hero-section">
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <!-- Carousel Indicators -->
    <div class="carousel-indicators">
      @php $slideIndex = 0; @endphp
      @foreach($coverImages as $cover)
        @foreach($cover->image as $img)
          <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $slideIndex }}"
            class="{{ $slideIndex === 0 ? 'active' : '' }}"
            aria-current="{{ $slideIndex === 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $slideIndex + 1 }}"></button>
          @php $slideIndex++; @endphp
        @endforeach
      @endforeach
    </div>

    <!-- Carousel Slides -->
    <div class="carousel-inner">
      @php $slideIndex = 0; @endphp
      @foreach($coverImages as $cover)
        @foreach($cover->image as $img)
          <div class="carousel-item {{ $slideIndex === 0 ? 'active' : '' }}">
            <img src="{{ asset('uploads/coverimage/' . $img) }}" alt="Cover Image">
            <div class="hero-content">
              <h1 class="outline">Explore</h1>
              <h1 class="solid">The World</h1>
              <p>{{ $cover->title ?? 'Discover amazing places with us, your journey starts here.' }}</p>
              <a href="#" class="btn btn-outline-light">Discover Now</a>
            </div>
          </div>
          @php $slideIndex++; @endphp
        @endforeach
      @endforeach
    </div>
  </div>
</section>

<!-- Bootstrap Bundle JS (includes Popper and Carousel) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

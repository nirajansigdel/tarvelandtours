<!-- === HERO SECTION (Light Black Overlay) === -->

<style>
  /* === Minimal Custom CSS === */
  .hero-section {
    position: relative;
    height: 120vh; /* Your height preference */
    background: rgb(0, 0, 0);
  }

  .carousel-item {
    height: 120vh;
    position: relative;
  }

  .carousel-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    animation: zoomEffect 20s ease-in-out infinite;
  }

  @keyframes zoomEffect {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
  }

  .hero-content h1.outline {
    font-size: 5rem;
    font-weight: 900;
    color: transparent;
    -webkit-text-stroke: 1px #fff;
    text-transform: uppercase;
    letter-spacing: 2px;
  }

  .hero-content .solid {
    font-size: 4rem;
    font-weight: 900;
    color: #fff;
    text-transform: uppercase;
    margin-top: -1rem;
  }

  .hero-content .btn 
  { padding: 0.75rem 2rem; border-radius: 50px; font-weight: 600; }
  @media (max-width: 768px) {
    .hero-content h1.outline {
      font-size:3rem;
    }
    .hero-content .solid {
      font-size:3rem;
    }
    .hero-content {
      left: 0 !important;           /* move to left */
      transform: translate(0, -50%) !important; /* remove horizontal centering */
      text-align: left !important;  /* align text to left */
      padding-left: 1rem;           /* optional */
    }
    .hero-content .lead{
      font-size:1.1rem;
    }
  }
</style>

<section class="hero-section">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    
    <!-- Carousel Indicators -->
    <div class="carousel-indicators">
      @php $slideIndex = 0; @endphp
      @foreach($coverImages as $cover)
        @foreach($cover->image as $img)
          <button type="button"  class="py-2 none" data-bs-target="#heroCarousel" data-bs-slide-to="{{ $slideIndex }}"
            class="{{ $slideIndex === 0 ? 'active' : '' }}"
            aria-current="{{ $slideIndex === 0 ? 'true' : 'false' }}"
            aria-label="Slide {{ $slideIndex + 1 }}" style="display: none;"></button>
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
            <img src="{{ asset('uploads/coverimage/' . $img) }}" class="d-block w-100" alt="Cover Image">

            <!-- Light Black Overlay -->
            <div class="position-absolute top-0 start-0 w-100 h-100" 
                 style="background: rgba(0, 0, 0, 0.2);"></div>

            <!-- Hero Content -->
            <div class="hero-content position-absolute top-50 start-50 translate-middle text-center text-white px-3">
              <h1 class="outline">{{ __('messages.hero_title_outline') }}</h1>
              <h2 class="solid">{{ __('messages.hero_title_solid') }}</h2>
              <p class="lead mb-4">{{ $cover->title ?? __('messages.hero_description') }}</p>
              <a href="{{ route('products.index.front') }}" class="btn btn-outline-light rounded-pill px-4">
                {{ __('messages.discover_now') }}
              </a>
            </div>
          </div>
          @php $slideIndex++; @endphp
        @endforeach
      @endforeach
    </div>
  </div>
</section>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

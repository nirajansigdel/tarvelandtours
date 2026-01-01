<!-- === HERO SECTION (Light Black Overlay) === -->


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
                 style="background: rgba(0, 0, 0, 0);"></div>

            <!-- Hero Content -->
            <div class="hero-content position-absolute top-50 start-50 translate-middle text-center text-white px-3">
              <h1 class="outline">{{ __('messages.hero_title_outline') }}</h1>
              <h2 class="solid">{{ __('messages.hero_title_solid') }}</h2>
              <p class="lead mb-4">{{ $cover->getTranslated('title')?? __('messages.hero_description') }}</p>
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

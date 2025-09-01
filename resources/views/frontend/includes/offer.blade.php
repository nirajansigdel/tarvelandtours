
<style>
  /* Service Card Styles (your original design) */
.service-card {
  position: relative;
  border-radius: 0.3rem;
  overflow: hidden;
  box-shadow: 0 10px 24px rgba(16, 24, 40, 0.08);
  transition:
    transform 0.45s ease,
    box-shadow 0.45s ease,
    border-radius 0.45s ease;
  will-change: transform, box-shadow, border-radius;
  cursor: pointer;
  width:300px !important; /* full width inside col-md-3 */
}

.service-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 32px rgba(16, 24, 40, 0.14);
  border-bottom-right-radius: 24%;
}

.service-image {
  position: relative;
  width: 100%;
  height: 400px;
  overflow: hidden;
  will-change: border-radius;
}

.service-image img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover;
  display: block;
  border-bottom-left-radius: 0;
  transition:
    transform 1.1s cubic-bezier(0.22, 0.61, 0.36, 1),
    border-bottom-left-radius 0.45s ease;
  will-change: transform, border-radius;
}

.service-card:hover .service-image img {
  transform: scale(1.05);
  border-bottom-right-radius: 24%;
}

.service-badge {
  position: absolute;
  top: 12px;
  left: 12px;
  background: rgba(255, 255, 255, 0.9);
  backdrop-filter: blur(6px);
  color: #0f172a;
  padding: 0.25rem 0.6rem;
  border-radius: 999px;
  font-size: 0.75rem;
  font-weight: 700;
}

.service-content {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 1rem 1.25rem 1.25rem;
  color: #ffffff;
  transform: translateY(10px);
  transition: transform 0.6s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.6s ease;
}

.service-card:hover .service-content {
  transform: translateY(0);
}

.contenttitle {
  margin: 0 0 0.25rem 0;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.3;
}

.contentdesc {
  font-size: 0.9rem;
  opacity: 0.9;
  margin-bottom: 0.75rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

/* Responsive tweak */
@media (max-width: 768px) {
  .service-image {
    height: 240px;
  }
}

/* Slider Styles */
.slider-wrapper {
  overflow: hidden;
  width: 100%;
  margin-top: 2rem;
}

.slider-track {
  display: flex;
  gap: 1rem; /* spacing between cards */
  animation: scroll-left 40s linear infinite;
  width: max-content; /* allow horizontal scroll */
}

/* Important: Bootstrap col-md-3 acts as flex item with fixed width */
.slider-track > .col-md-3 {
  flex: 0 0 25%; /* exactly 1/4 width */
  max-width: 25%;
  box-sizing: border-box;
}

@keyframes scroll-left {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(-50%);
  }
}

</style>
<section class="container-fluid tarveloffer pb-5">
  <div class="container d-flex flex-column justify-content-center gap-4">
    <div class="row text-center">
      <h1 class="heading p-0 m-0">Exclusive Offers This Season</h1>
      <p class="extralarger p-0 m-0">Explore New Horizons</p>
    </div>



    <div class="slider-wrapper">
      <div class="slider-track">
        {{-- Loop your offers --}}
        @foreach ($products->unique('heading') as $prod)
      
            <div class="service-card">
              <div class="service-image">
                @if ($prod->image && !empty($prod->image))
                  <img src="{{ asset('uploads/products/' . $prod->image) }}" alt="{{ $prod->heading }}" />
                @else
                  <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" alt="Default Image" />
                @endif
                <span class="service-badge">Exclusive Offer</span>
              </div>
              <div class="service-content">
                <h3 class="contenttitle text-capitalize text-white">{{ Str::limit(strip_tags($prod->heading), 15) }}</h3>
                <p class="contentdesc text-white">{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($prod->content)), 120) !!}</p>
                
                <!-- Pricing Information -->
                @if($prod->original_price || $prod->discounted_price)
                  <div class="pricing-info mt-2">
                    @if($prod->original_price && $prod->discounted_price)
                      <div class="d-flex align-items-center gap-2">
                        <span class="text-decoration-line-through text-white" style="font-size: 0.9rem;">NPR {{ number_format($prod->original_price) }}</span>
                        <span class="fw-bold text-warning" style="font-size: 1.1rem;">NPR {{ number_format($prod->discounted_price) }}</span>
                      </div>
                    @elseif($prod->discounted_price)
                      <span class="fw-bold text-white" style="font-size: 1.1rem;">NPR {{ number_format($prod->discounted_price) }}</span>
                    @elseif($prod->original_price)
                      <span class="fw-bold text-warning" style="font-size: 1.1rem;">NPR {{ number_format($prod->original_price) }}</span>
                    @endif
                  </div>
                @endif
              </div>
            </div>
          
        @endforeach
      </div>
    </div>

    <div class="row d-flex flex-column justify-content-center align-items-center mt-4">
      <div class="col-md-3">
        <a href="{{ route('Service') }}">
          <button class="cta-button btn btn-primary px-5">View More</button>
        </a>
      </div>
    </div>
  </div>
</section>

<style>
  .destination-content {
    position: relative;
    z-index: 2;
  }

  .service-card {
    border-radius: 0.3rem;
    overflow: hidden;
    background-color: #fff;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    height: 100%;
  }

  .service-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
  }

  .service-image img {
    width: 100%;
    height: 220px;
    object-fit: cover;
  }

  .service-content {
    padding: 1rem;
    color: #333;
  }
   .service-content::before {
    position: absolute;

  height: 100%;
    width: 100%;
    top: 0;
    left: 0;
    content: "";
    opacity: 0.6;
    z-index: -1;
    border-radius: 0.3rem;
    background:var(--primary);
  }

  .service-title {
    font-size: 1.1rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
  }

  .service-desc {
    font-size: 0.9rem;
    color: #666;
    line-height: 1.4;
    height: 2.7em;
    overflow: hidden;
  }


  @media (max-width: 768px) {
    .service-image img {
      height: 160px;
    }
  }
</style>

<section class="container-fluid destination py-5">
  <div class="container destination-content">
    <div class="row mb-4">
      <div class="col-7">
        <h1 class="heading ">Unmissable Travel Deals</h1>
        <p class="extralarger">Escape Now, Pay Less</p>
      </div>
    </div>

    <div class="row g-4">
      @foreach ($Destinationcard->take(6) as $service)
        <div class="col-md-4 col-lg-3">
          <div class="service-card h-100">
            <div class="service-image">
              <img src="{{ $service->image ? asset('uploads/products/' . $service->image) : 'https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60' }}" alt="Service Image">
            </div>
            <div class="service-content">
              <h3 class="contenttitle text-white">{{ Str::limit(strip_tags($service->heading), 20) }}</h3>
              <p class="codesc text-white pt-1">
                {!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($service->content)), 120) !!}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-auto">
        <a href="{{ route('Service') }}">
          <button class="btn cta-button px-5">View More</button>
        </a>
      </div>
    </div>
  </div>
</section>




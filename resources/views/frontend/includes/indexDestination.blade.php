<style>

</style>

<section class="container-fluid destination py-5">
  <div class="container destination-content">
    <div class="row mb-4">
      <div class="col-7">
        <h1 class="heading ">{{ __('messages.unmissable_travel_deals') }}</h1>
        <p class="extralarger">{{ __('messages.escape_now_pay_less') }}</p>
      </div>
    </div>

    <div class="row g-4">
      @foreach ($Destinationcard->take(8) as $populardestinationinnepal)
        <a class="col-md-4 col-lg-3" href="{{ route('products.detail', $populardestinationinnepal->id) }}">
          <div class="service-card h-100">
            <div class="service-image">
              <img src="{{ (is_array($populardestinationinnepal->images) && count($populardestinationinnepal->images)) ? asset('uploads/products/' . $populardestinationinnepal->images[0]) : 'https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60' }}" alt="Service Image">
            </div>
            <div class="service-content">
              <h3 class="contenttitle text-white">{{ Str::limit(strip_tags($populardestinationinnepal->heading), 28) }}</h3>
              <p class="codesc text-white pt-1">
                {!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($populardestinationinnepal->content)), 120) !!}
              </p>
            </div>
          </div>
        </a>
      @endforeach
    </div>

    <div class="row mt-5 justify-content-center">
      <div class="col-md-auto">
        <a href="{{ route('Service') }}">
          <button class="btn cta-button px-5">{{ __('messages.view_more') }}</button>
        </a>
      </div>
    </div>
  </div>
</section>



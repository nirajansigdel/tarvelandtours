@extends('frontend.layouts.master')


<head>
    <title>{{ $blogmeta?->title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $blogmeta?->description ?? '' }}">

</head>

@section('content')
<section class="position-relative text-white text-center mb-5"
        style="background: url('{{ asset('image/blog.webp') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <p class="fw-bold display-4">{{ __('messages.our_stories') }}</p>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">{{ __('messages.Home') }}</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ __('messages.Blogs') }}
                </p>
            </div>
        </div>
    </section>


<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="text-center mb-4">
        <p class="extralarger pb-2">{{ __('messages.our_stories_sub') }}</p>
        <p class="xs-text"> {{ __('messages.our_stories_desc') }}</p>
      </div>
    </div>
    <div class="row">
      @foreach ($blogpostcategories as $blogs)
        <div class="col-md-4 mb-4">
          <div class="blogs-card reveal-up">
            <div class="blogs-image">
              @if ($blogs->image)
                <img src="{{ asset('uploads/blogpostcategory/' . $blogs->image) }}" alt="popular short trek">
              @else
                <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" alt="Default Image">
              @endif
              <span class="blogs-badge">{{ __('messages.Blogs') }}</span>
            </div>
            <div class="blogs-content">
              <h3 class="blogs-title text-capitalize">{{ Str::limit(strip_tags($blogs->getTranslated('title')), 40) }}</h3>
              <p class="blogs-desc">{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($blogs->getTranslated('content'))), 150) !!}</p>
              <a href="{{ route('blog', $blogs->slug) }}" class="blogs-cta">{{ __('messages.view_details') }}<span class="arrow">→</span></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <div class="text-center mt-4">
      <a href="{{ route('Service') }}">
        <button class="cta-button btn btn-primary px-5">{{ __('messages.view_more') }}</button>
      </a>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var container = document.querySelector('.whyus');
    if (!container) return;

    var elements = Array.prototype.slice.call(container.querySelectorAll('.reveal-up'));
    elements.forEach(function (el, index) {
      el.style.setProperty('--reveal-delay', (index * 120) + 'ms');
    });

    if ('IntersectionObserver' in window) {
      var observer = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });

      elements.forEach(function (el) { observer.observe(el); });
    } else {
      elements.forEach(function (el) { el.classList.add('is-visible'); });
    }
  });
</script>

<!-- The ascent-flow section remains unchanged -->

<section class="ascent-flow my-5">
    <div class="container text-center">
        <div class="row align-items-center justify-content-center mb-5">
            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/first.avif') }}" class="img-fluid" alt="New Customer">
                    <div class="label-tag red">{{ __('messages.active') }}</div>
                </div>
                <p class="flow-caption mt-3">{{ __('messages.hope_for_digital_world') }}</p>
            </div>

            <div class="col-md-4 d-flex justify-content-center mb-4">
                <div class="central-logo">
                    <img src="{{ asset('image/logo.avif') }}" class="img-fluid" alt="Aide Ascent">
                </div>
            </div>

            <div class="col-md-4 position-relative mb-4">
                <div class="circle-img">
                    <img src="{{ asset('image/digital.avif') }}" class="img-fluid rounded-circle" alt="Operations">
                    <div class="label-tag red">{{ __('messages.need') }}</div>
                </div>
                <p class="flow-caption mt-3">{{ __('messages.empower_young_lives') }}</p>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4 position-relative">
                <div class="circle-img">
                    <img src="{{ asset('image/ch.avif') }}" class="img-fluid rounded-circle" alt="Loyal Customer">
                    <div class="label-tag red">{{ __('messages.on_time') }}</div>
                </div>
                <p class="flow-caption mt-3"> {{ __('messages.growing_with_grace') }}</p>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('frontend.layouts.master')

@section('content')
<section class="position-relative text-white text-center mb-5"
        style="background: url('{{ asset('image/blog.webp') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">{{ __('messages.our_stories') }}</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">{{ __('messages.Home') }}</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ __('messages.Blogs') }}
                </p>
            </div>
        </div>
    </section>

<style>

/* Updated styles for the blogs cards */
.whyus {
  background-color: #f5f5f5;
}

.blogs-card {
  position: relative;
  border-radius: 1rem;
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 10px 24px rgba(16, 24, 40, 0.08);
  transition: transform 0.45s ease, box-shadow 0.45s ease;
}

.blogs-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 32px rgba(16, 24, 40, 0.14);
}

.blogs-image {
  position: relative;
}

.blogs-image img {
  width: 100%;
  height: 320px;
  object-fit: cover;
  display: block;
  transition: transform 1.1s cubic-bezier(0.22, 0.61, 0.36, 1);
}

.blogs-card:hover .blogs-image img {
  transform: scale(1.05);
}

.blogs-image::after {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(2, 6, 23, 0.85) 0%,
    rgba(2, 6, 23, 0.5) 45%,
    rgba(2, 6, 23, 0.0) 75%
  );
  pointer-events: none;
  transition: opacity 0.6s ease;
}

.blogs-card:hover .blogs-image::after {
  opacity: 0.95;
}

.blogs-badge {
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

.blogs-content {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 1rem 1.25rem 1.25rem;
  color: #ffffff;
  transform: translateY(10px);
  transition: transform 0.6s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.6s ease;
}

.blogs-card:hover .blogs-content {
  transform: translateY(0);
}

.blogs-title {
  margin: 0 0 0.25rem 0;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.3;
}

.blogs-desc {
  font-size: 0.9rem;
  opacity: 0.9;
  margin-bottom: 0.75rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.blogs-cta {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  background-color: rgba(255, 255, 255, 0.9);
  color: #0f172a;
  padding: 0.5rem 0.75rem;
  border-radius: 999px;
  font-weight: 700;
  font-size: 0.875rem;
  text-decoration: none;
  transition: background-color 0.3s ease, color 0.3s ease;
}

.blogs-cta:hover {
  background-color: #ffffff;
}

.blogs-cta .arrow {
  transition: transform 0.3s ease;
}

.blogs-cta:hover .arrow {
  transform: translateX(2px);
}

.btn-primary {
  background-color: #f26522;
  border-color: #f26522;
  font-weight: 600;
}

.btn-primary:hover {
  background-color: #d4571e;
  border-color: #d4571e;
}

/* Reveal-up effect */
.reveal-up {
  opacity: 0;
  transform: translateY(40px) scale(0.98);
  transition: transform 0.9s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.9s ease-out;
  transition-delay: var(--reveal-delay, 0ms);
  will-change: transform, opacity;
}

.reveal-up.is-visible {
  opacity: 1;
  transform: translateY(0) scale(1);
}

@media (prefers-reduced-motion: reduce) {
  .reveal-up {
    opacity: 1;
    transform: none;
    transition: none;
  }
}

@media (max-width: 768px) {
  .blogs-image img { height: 240px; }
}

</style>

<section class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="text-center mb-4">
        <h1 class="extralarger pb-2">{{ __('messages.our_stories_sub') }}</h1>
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
              <h3 class="blogs-title text-capitalize">{{ Str::limit(strip_tags($blogs->title), 40) }}</h3>
              <p class="blogs-desc">{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($blogs->content)), 150) !!}</p>
              <a href="{{ route('SingleBlogpostcategory', $blogs->slug) }}" class="blogs-cta">{{ __('messages.view_details') }}<span class="arrow">→</span></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    <style>
      .bordergreen {
        background: transparent;
        border: 2px solid var(--primary);
        transition: background 0.9s ease, color 0.3s ease;
      }
      .bordergreen:hover {
        background: #448c4c;
        color: white;
      }
    </style>
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
<style>
    .ascent-flow .circle-img {
    position: relative;
    display: inline-block;
    background: radial-gradient(circle at center, #fff 50%, #f8dcdc 51%);
    border-radius: 50%;
    padding: 10px;
    border: 2px dashed #b40000;
    width: 220px;
    height: 220px;
    overflow: hidden;
}

.ascent-flow .circle-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.central-logo img {
    width: 200px;
    height: 200px;
    object-fit: contain;
}

.label-tag {
    position: absolute;
    right: -10px;
    top: 50%;
    transform: translateY(-50%);
    background: #b40000;
    color: #fff;
    padding: 6px 16px;
    border-radius: 20px;
    font-weight: 600;
    font-size: 14px;
    box-shadow: 0 0 5px rgba(0,0,0,0.1);
}

.label-tag::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -12px;
    width: 6px;
    height: 6px;
    background: #b40000;
    border-radius: 50%;
    transform: translateY(-50%);
    animation: pulse 1s infinite;
}

.label-info {
    position: absolute;
    top: -10px;
    left: 0;
    background: #fff;
    padding: 3px 10px;
    font-size: 12px;
    font-weight: 500;
    color: #b40000;
    border: 1px dashed #b40000;
    border-radius: 20px;
}

.flow-caption {
    font-weight: 600;
    font-size: 18px;
}

@keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.4); opacity: 0.6; }
    100% { transform: scale(1); opacity: 1; }
}

@media (max-width: 768px) {
    .central-logo img {
        width: 150px;
        height: 150px;
    }
    .ascent-flow .circle-img {
        width: 160px;
        height: 160px;
    }
    .label-tag {
        font-size: 12px;
        padding: 4px 10px;
    }
}

</style>

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

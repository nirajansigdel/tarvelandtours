<style>
/* Blog section styles */
.blog-card {
  position: relative;
  border-radius: 1rem;
  overflow: hidden;
  background-color: #fff;
  box-shadow: 0 10px 24px rgba(16, 24, 40, 0.08);
  transition: transform 0.45s ease, box-shadow 0.45s ease;
}

.blog-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 16px 32px rgba(16, 24, 40, 0.14);
}

.blog-image {
  position: relative;
}

.blog-image img {
  width: 100%;
  height: 320px;
  object-fit: cover;
  display: block;
  transition: transform 1.1s cubic-bezier(0.22, 0.61, 0.36, 1);
}

.blog-card:hover .blog-image img {
  transform: scale(1.05);
}

.blog-image::after {
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

.blog-card:hover .blog-image::after {
  opacity: 0.95;
}

.blog-badge {
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

.blog-content {
  position: absolute;
  left: 0;
  right: 0;
  bottom: 0;
  padding: 1rem 1.25rem 1.25rem;
  color: #ffffff;
  transform: translateY(10px);
  transition: transform 0.6s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.6s ease;
}

.blog-card:hover .blog-content {
  transform: translateY(0);
}

.blog-title {
  margin: 0 0 0.25rem 0;
  font-weight: 700;
  font-size: 1.125rem;
  line-height: 1.3;
}

.blog-desc {
  font-size: 0.9rem;
  opacity: 0.9;
  margin-bottom: 0.75rem;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.blog-cta {
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

.blog-cta:hover {
  background-color: #ffffff;
}

.blog-cta .arrow {
  transition: transform 0.3s ease;
}

.blog-cta:hover .arrow {
  transform: translateX(2px);
}

/* Reveal effect */
.reveal-ups {
  opacity: 0;
  transform: translateY(40px) scale(0.98);
  transition: transform 0.9s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.9s ease-out;
  transition-delay: var(--reveal-delay, 0ms);
  will-change: transform, opacity;
}

.reveal-ups.is-visible {
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
  .blog-image img { height: 240px; }
}
</style>

<section class="container-fluid blog-section py-5">
  <div class="container">
    <div class="row">
      <div class="text-center mb-4">
        <p class="extralarger pb-2">{{ __('messages.collection_blogs') }}</p>
        <p class="xs-text">{{ __('messages.timeless_adventures') }}</p>
      </div>
    </div>
    <div class="row">
      @foreach ($blogs as $blogs)
        <div class="col-md-4 mb-4">
          <div class="blog-card reveal">
            <div class="blog-image">
              @if ($blogs->image)
                <img src="{{ asset('uploads/blogpostcategory/' . $blogs->image) }}" alt="blog image">
              @else
                <img src="https://plus.unsplash.com/premium_photo-1705091309202-5838aeedd653?w=500&auto=format&fit=crop&q=60" alt="Default Image">
              @endif
              <span class="blog-badge">{{ __('messages.blogs') }}</span>
            </div>
            <div class="blog-content">
              <h3 class="blog-title text-capitalize">{{ Str::limit(strip_tags($blogs->title), 40) }}</h3>
              <p class="blog-desc">{!! Str::limit(str_replace('&nbsp;', ' ', strip_tags($blogs->content)), 150) !!}</p>
              <a href="{{ route('SingleBlogpostcategory', $blogs->slug) }}" class="blog-cta">{{ __('messages.view_details') }} <span class="arrow">→</span></a>
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
      <a href="{{ route('Blogpostcategory') }}">
        <button class="cta-button btn btn-primary px-5">{{ __('messages.view_more') }}</button>
      </a>
    </div>
  </div>
</section>

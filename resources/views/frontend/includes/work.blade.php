<style>
  /* Work section styling */
  .work-area { background-color: #f1f5f9; }

  .media-card {
    position: relative;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 12px 28px rgba(16, 24, 40, 0.12);
    transition: transform 0.45s ease, box-shadow 0.45s ease;
  }
  .media-card:hover { transform: translateY(-6px); box-shadow: 0 18px 36px rgba(16, 24, 40, 0.18); }
  .media-card img { width: 100%; height: 360px; object-fit: cover; display: block; }
  .media-card::after {
    content: ""; position: absolute; inset: 0;
    background: linear-gradient(to top, rgba(2,6,23,0.55) 0%, rgba(2,6,23,0.20) 40%, rgba(2,6,23,0) 70%);
    pointer-events: none; transition: opacity 0.5s ease;
  }
  .media-badge {
    position: absolute; left: 12px; top: 12px;
    background: rgba(255,255,255,0.9); color: #0f172a; backdrop-filter: blur(6px);
    padding: 6px 10px; border-radius: 999px; font-weight: 700; font-size: 12px;
  }

  /* Feature list */
  .feature-list { list-style: none; padding: 0; margin: 0; display: grid; gap: 16px; }
  .feature-item { display: grid; grid-template-columns: 44px 1fr; gap: 12px; align-items: start; padding: 12px; border-radius: 12px; background: #ffffff; box-shadow: 0 6px 16px rgba(16,24,40,0.08); transition: transform 0.35s ease, box-shadow 0.35s ease; }
  .feature-item:hover { transform: translateY(-4px); box-shadow: 0 12px 24px rgba(16,24,40,0.12); }
  .feature-icon { width: 44px; height: 44px; border-radius: 10px; display: grid; place-items: center; font-size: 20px; }
  .icon-orange { background: #fff1e8; color: #f26522; }
  .icon-blue { background: #e6f0ff; color: #2563eb; }
  .icon-green { background: #e8f7ee; color: #15803d; }
  .feature-title { margin: 0 0 4px 0; font-weight: 800; font-size: 1.05rem; color: #0f172a; }

  /* CTA */
  .work-cta { display: inline-flex; align-items: center; gap: 8px; background: #f26522; color: #fff; padding: 10px 16px; border-radius: 999px; text-decoration: none; font-weight: 700; transition: background 0.3s ease; }
  .work-cta:hover { background: #d4571e; color: #fff; }
  .work-cta .arrow { transition: transform 0.3s ease; }
  .work-cta:hover .arrow { transform: translateX(2px); }

  /* Reveal-up animation */
  .reveal-up { opacity: 0; transform: translateY(28px) scale(0.98); transition: transform 0.6s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.6s ease-out; transition-delay: var(--reveal-delay, 0ms); will-change: transform, opacity; }
  .reveal-up.is-visible { opacity: 1; transform: translateY(0) scale(1); }
  @media (prefers-reduced-motion: reduce) { .reveal-up { opacity: 1; transform: none; transition: none; } }

  @media (max-width: 768px) { .media-card img { height: 260px; } }
</style>

<section class="py-5 work-area">
  <div class="container">
    <div class="text-center mb-5">
      <h2 class="fw-bold">Innovative Software Solutions</h2>
      <p class="text-muted fs-5">Delivering cutting-edge technology tailored to your business needs for optimal performance and growth.</p>
    </div>

    <div class="row align-items-center">
      <!-- Image Column -->
      <div class="col-md-6 mb-4 mb-md-0">
        <div class="media-card reveal-up" style="--reveal-delay: 60ms">
          <img src="{{ asset('image/rescue.avif') }}" alt="Software Solutions Team" class="img-fluid">
          <span class="media-badge">Trusted Partner</span>
        </div>
      </div>

      <!-- Text Column -->
      <div class="col-md-6">
        <ul class="feature-list">
          <li class="feature-item reveal-up" style="--reveal-delay: 120ms">
            <div class="feature-icon icon-orange">☁️</div>
            <div>
              <h3 class="feature-title">Cloud Solutions</h3>
              <p class="contentdesc ">Robust, scalable cloud services that enhance security and ensure seamless access to your data.</p>
            </div>
          </li>
          <li class="feature-item reveal-up" style="--reveal-delay: 220ms">
            <div class="feature-icon icon-blue">🧩</div>
            <div>
              <h3 class="feature-title">Custom Software Development</h3>
              <p class="contentdesc">Tailored solutions built around your business processes to maximize efficiency and impact.</p>
            </div>
          </li>
          <li class="feature-item reveal-up" style="--reveal-delay: 320ms">
            <div class="feature-icon icon-green">📱</div>
            <div>
              <h3 class="feature-title">Mobile App Development</h3>
              <p class="contentdesc">Engaging, user-friendly mobile apps designed to delight customers and drive retention.</p>
            </div>
          </li>
        </ul>
        <div class="mt-4 reveal-up" style="--reveal-delay: 420ms">
          <a href="{{ route('Service') }}" class="work-cta">Explore Services <span class="arrow">→</span></a>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    var section = document.querySelector('.work-area');
    if (!section) return;
    var nodes = Array.prototype.slice.call(section.querySelectorAll('.reveal-up'));
    if ('IntersectionObserver' in window) {
      var io = new IntersectionObserver(function (entries, obs) {
        entries.forEach(function (e) {
          if (e.isIntersecting) {
            e.target.classList.add('is-visible');
            obs.unobserve(e.target);
          }
        });
      }, { threshold: 0.15, rootMargin: '0px 0px -10% 0px' });
      nodes.forEach(function (n) { io.observe(n); });
    } else {
      nodes.forEach(function (n) { n.classList.add('is-visible'); });
    }
  });
  </script>


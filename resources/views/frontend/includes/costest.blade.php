<section class="py-5 absolute" style="background-color: #f4f4f4;">
  <div class="container">
    <div class="row align-items-center">


      <!-- LEFT: Text Content -->
    <div class="col-lg-6 mb-4 mb-lg-0">
                <p class="heading content-topheading">About us</p>
                <h1 class="extralarge mb-3">{{ $about->title ?? '' }}</h1>
                @php
                    $text = $about->description ?? 'No description available.';
                    $parts = explode('.', $text);

                    if (count($parts) >= 3) {
                        $first = trim($parts[0]) . '.';
                        $second = trim($parts[1]) . '.';
                        $rest = implode('.', array_slice($parts, 2));
                        $text = $first . ' ' . $second . '<br>' . $rest;
                    }
                @endphp
                <div class="text-muted mb-4 xs-text-des">
                   {!! $text !!}
                </div>

                <!-- CTA -->
                <a href="#" class="btn cta-button">Read More</a>
            </div>

      <!-- RIGHT: Modern KPI grid with primary and secondary cards -->
      <div class="col-lg-6">
        <div class="kpi-grid">
          <div class="kpi-card kpi-orange kpi-card--primary reveal-up">
            <span class="kpi-emoji" aria-hidden="true">⚙️</span>
            <div class="kpi-value"><span class="kpi-number" data-target="75">0</span><span class="kpi-suffix">%</span>
            </div>
            <div class="kpi-label"> Tour Operations</div>
            <div class="kpi-progress">
              <div class="kpi-progress-bar" style="width:0%"></div>
            </div>
          </div>
          <div class="kpi-card kpi-yellow kpi-card--secondary reveal-up">
            <span class="kpi-emoji" aria-hidden="true">🗂️</span>
            <div class="kpi-value"><span class="kpi-number" data-target="20">0</span><span class="kpi-suffix">%</span>
            </div>
            <div class="kpi-label">Client Satisfaction</div>
            <div class="kpi-progress">
              <div class="kpi-progress-bar" style="width:0%"></div>
            </div>
          </div>
          <div class="kpi-card kpi-gray kpi-card--secondary reveal-up">
            <span class="kpi-emoji" aria-hidden="true">💸</span>
            <div class="kpi-value"><span class="kpi-number" data-target="5">0</span><span class="kpi-suffix">%</span>
            </div>
            <div class="kpi-label">Booking Support</div>
            <div class="kpi-progress">
              <div class="kpi-progress-bar" style="width:0%"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <style>
    /* Left checklist */
    .trust-list {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: 1fr;
      gap: 8px 16px;
    }

    .trust-list li {
      display: flex;
      align-items: center;
      gap: 10px;
      color: #374151;
    }

    .trust-list .check {
      display: inline-flex;
      width: 22px;
      height: 22px;
      align-items: center;
      justify-content: center;
      border-radius: 999px;
      background: #e7f5ec;
      color: #1f7a4c;
      font-weight: 800;
      font-size: 13px;
    }

    /* KPI cards */
    .kpi-card {
      position: relative;
      border-radius: 16px;
      padding: 20px 18px;
      color: #ffffff;
      box-shadow: 0 10px 24px rgba(16, 24, 40, 0.12);
      transition: transform 0.45s ease, box-shadow 0.45s ease;
      overflow: hidden;
      isolation: isolate;
    }

    .kpi-card::after {
      content: "";
      position: absolute;
      inset: -20% -10% auto auto;
      width: 160px;
      height: 160px;
      border-radius: 50%;
      background: radial-gradient(circle at center, rgba(255, 255, 255, 0.4), rgba(255, 255, 255, 0) 60%);
      transform: translate(20%, -20%);
      pointer-events: none;
      opacity: 0.35;
    }

    .kpi-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 16px 32px rgba(16, 24, 40, 0.18);
    }

    .kpi-emoji {
      position: absolute;
      top: 10px;
      right: 12px;
      font-size: 20px;
      opacity: 0.35;
      filter: grayscale(0.1);
    }

    .kpi-orange {
      background: linear-gradient(135deg, #ff8a3d 0%, #f26522 60%, #b24110 100%);
    }

    .kpi-yellow {
      background: linear-gradient(135deg, #fff3b0 0%, #ffd166 60%, #b08c11 100%);
      color: #1f2937;
    }

    .kpi-gray {
      background: linear-gradient(135deg, #c7c7c7 0%, #6c6c6c 60%, #3c3c3c 100%);
    }

    .kpi-value {
      font-weight: 800;
      font-size: 36px;
      line-height: 1;
      letter-spacing: -0.5px;
      margin-bottom: 8px;
    }

    .kpi-yellow .kpi-value {
      color: #0f172a;
    }

    .kpi-suffix {
      margin-left: 2px;
      opacity: 0.9;
    }

    .kpi-label {
      font-size: 13px;
      opacity: 0.9;
      letter-spacing: 0.3px;
      text-transform: uppercase;
      font-weight: 700;
    }

    .kpi-progress {
      position: relative;
      width: 100%;
      height: 6px;
      border-radius: 999px;
      margin-top: 10px;
      background: rgba(255, 255, 255, 0.25);
      overflow: hidden;
    }

    .kpi-progress-bar {
      height: 100%;
      width: 0%;
      background: #ffffff;
      border-radius: 999px;
      transition: width 1.2s ease-out;
    }

    .kpi-yellow .kpi-progress {
      background: rgba(17, 24, 39, 0.15);
    }

    .kpi-yellow .kpi-progress-bar {
      background: #0f172a;
    }

    /* Reveal-up effect */
    .reveal-up {
      opacity: 0;
      transform: translateY(24px) scale(0.98);
      transition: transform 0.8s cubic-bezier(0.22, 0.61, 0.36, 1), opacity 0.8s ease-out;
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

    /* KPI grid layout */
    .kpi-grid {
      display: grid;
      grid-template-columns: 1.2fr 0.8fr;
      grid-template-rows: 1fr 1fr;
      gap: 14px;
    }

    .kpi-card--primary {
      grid-row: 1 / span 2;
      grid-column: 1;
      min-height: 210px;
    }

    .kpi-card--secondary {
      grid-column: 2;
      min-height: 100px;
    }

    @media (max-width: 992px) {
      .kpi-grid {
        grid-template-columns: 1fr;
        grid-template-rows: auto;
      }

      .kpi-card--primary {
        grid-row: auto;
        grid-column: auto;
      }

      .kpi-card--secondary {
        grid-column: auto;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var rightCol = document.querySelector('.row.align-items-center .col-lg-6 + .col-lg-6');
      if (!rightCol) return;

      var cards = Array.prototype.slice.call(rightCol.querySelectorAll('.reveal-up'));
      cards.forEach(function (el, index) {
        el.style.setProperty('--reveal-delay', (index * 140) + 'ms');
      });

      function countTo(element, target, duration) {
        var prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
        if (prefersReduced) {
          element.textContent = target;
          return;
        }
        var start = 0;
        var startTime = null;
        function step(timestamp) {
          if (!startTime) startTime = timestamp;
          var progress = Math.min((timestamp - startTime) / duration, 1);
          var value = Math.floor(progress * (target - start) + start);
          element.textContent = value;
          if (progress < 1) {
            window.requestAnimationFrame(step);
          }
        }
        window.requestAnimationFrame(step);
      }

      if ('IntersectionObserver' in window) {
        var observer = new IntersectionObserver(function (entries, obs) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add('is-visible');
              var num = entry.target.querySelector('.kpi-number');
              if (num && !num.dataset.counted) {
                num.dataset.counted = 'true';
                var target = parseInt(num.getAttribute('data-target') || '0', 10);
                countTo(num, target, 1200);
              }
              var bar = entry.target.querySelector('.kpi-progress-bar');
              var barTarget = entry.target.querySelector('.kpi-number');
              if (bar && barTarget) {
                var pct = parseInt(barTarget.getAttribute('data-target') || '0', 10);
                bar.style.width = Math.max(0, Math.min(60, pct)) + '%';
              }
              obs.unobserve(entry.target);
            }
          });
        }, { threshold: 0.2, rootMargin: '0px 0px -10% 0px' });

        cards.forEach(function (el) { observer.observe(el); });
      } else {
        cards.forEach(function (el) {
          el.classList.add('is-visible');
          var num = el.querySelector('.kpi-number');
          if (num) num.textContent = num.getAttribute('data-target') || '0';
          var bar = el.querySelector('.kpi-progress-bar');
          if (bar && num) { bar.style.width = (num.getAttribute('data-target') || '0') + '%'; }
        });
      }
    });
  </script>
</section>
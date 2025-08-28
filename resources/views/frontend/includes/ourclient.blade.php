<style>
  #clientScrollContainer {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  #clientScrollContainer::-webkit-scrollbar {
    display: none;
  }

  .client-card {
    position: relative;
    width: 260px;
    height: 260px;
    cursor: pointer;
    /* border: 1px solid #ccc; */
    overflow: hidden;
    transition: border-color 0.3s ease;
    background: white;
   
  }

  .card-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: filter 0.3s ease;
    
  }

  .client-card:hover .card-image {
    filter: brightness(85%);
  }

  /* Slide-in overlay from left to right
  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    background-color: rgba(13, 110, 253, 0.3);
    transform: translateX(-100%);
    transition: transform 0.9s ease;
    z-index: 1;
    pointer-events: none;
    border-radius:200px;
  }

  .client-card:hover .overlay {
    transform: translateX(0);
    pointer-events: auto;
    border-radius:200px;
  }

  .client-name {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: white;
    font-size: 1.5rem;
    font-weight: 700;
    opacity: 0;
    transition: opacity 0.3s ease 0.1s;
    z-index: 2;
    pointer-events: none;
    user-select: none;
    width: 100%;
    text-align: center;
  }

  .client-card:hover .client-name {
    opacity: 1;
  }
     */
</style>

<section class="container-fluid bg-gray client-section py-5">
  <div class="container">
 
    <div id="clientScrollContainer" class="d-flex gap-4 overflow-auto px-3 pb-3" style="scroll-behavior: auto;">
      @foreach ($clients as $client)
        <!-- Client Card -->
        <div class="client-card rounded flex-shrink-0 shadow">
          <img src="{{ asset('uploads/client/' . $client->image) }}" alt="{{ $client->name ?? 'Client' }}" class="card-image" />
          <div class="overlay"></div>
        </div>
      @endforeach
      @foreach ($clients as $client)
        <!-- Duplicated set for seamless loop -->
        <div class="client-card rounded flex-shrink-0 shadow" aria-hidden="true">
          <img src="{{ asset('uploads/client/' . $client->image) }}" alt="" class="card-image" />
          <div class="overlay"></div>
        </div>
      @endforeach
    </div>
  </div>
</section>


<script>
  (function () {
    var container = document.getElementById('clientScrollContainer');
    if (!container) return;

    var reduceMotion = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduceMotion) return;

    var speedPxPerFrame = 0.4; // adjust speed here
    var rafId = null;

    function tick() {
      var half = container.scrollWidth / 2;
      container.scrollLeft += speedPxPerFrame;
      if (container.scrollLeft >= half) {
        container.scrollLeft -= half;
      }
      rafId = window.requestAnimationFrame(tick);
    }

    function start() { if (!rafId) rafId = window.requestAnimationFrame(tick); }
    function stop() { if (rafId) { window.cancelAnimationFrame(rafId); rafId = null; } }

    // Pause on hover, resume on leave
    container.addEventListener('mouseenter', stop);
    container.addEventListener('mouseleave', start);

    // Start scrolling
    start();
  })();
</script>

<section class="custom-features-section">
  <div class="container py-5">
    <div class="row text-center g-4 justify-center ">
      <div class="col-6 col-md-3 feature-box d-flex flex-column  fcc " style="animation-delay: 0s;">
    <img src="{{ asset('image/services-2.svg') }}" alt="" class="iconsimg">
        <h5 class="fw-bold text-white mt-2">Map Location</h5>
        <p class="contentdesc">Lorem Ipsum is simply dummy text of the printing.</p>
      </div>
      <div class="col-6 col-md-3 feature-box d-flex flex-column  fcc" style="animation-delay: 0.2s;">
       <img src="{{ asset('image/services-1.svg') }}" alt="" class="iconsimg">
        <h5 class="fw-bold text-white mt-2">Traveling Bag</h5>
        <p class="contentdesc">Lorem Ipsum is simply dummy text of the printing.</p>
      </div>
      <div class="col-6 col-md-3 feature-box d-flex flex-column fcc" style="animation-delay: 0.4s;">
        <img src="{{ asset('image/services-3.svg') }}" alt="" class="iconsimg">
        <h5 class="fw-bold text-white mt-2">Photography</h5>
        <p class="contentdesc">Lorem Ipsum is simply dummy text of the printing.</p>
      </div>
      <div class="col-6 col-md-3 feature-box  d-flex flex-column  fcc" style="animation-delay: 0.6s;">
        <img src="{{ asset('image/services-2.svg') }}" alt="" class="iconsimg">
        <h5 class="fw-bold text-white mt-2">Affordable Prices</h5>
        <p class="contentdesc">Lorem Ipsum is simply dummy text of the printing.</p>
      </div>
    </div>
  </div>
</section>

<style>
  :root {
    /* Gradient with transparency (alpha) */
    --primary-gradient: linear-gradient(to bottom, rgba(2, 31, 65, 1), rgba(0, 42, 80, 1));
  }

  .custom-features-section {
    background: var(--primary-gradient);
    color: #ddd;
    position: relative;
    top:-5.5rem;
    z-index: 1;
  }



  .feature-box {
    opacity: 0;
    animation-name: slideUpFadeIn;
    animation-duration: 0.8s;
    animation-fill-mode: forwards;
    animation-timing-function: ease-out;
    justify-content: center;
    align-items: center !important;
    position: relative;
    transition: transform 0.3s ease;
  }

  .feature-box::after {
    content: '';
    position: absolute;
    bottom: -1rem;
    left: 0;
    width: 0%;
    height: 2px;
    padding-top: 0.5rem;
    background-color: var(--bs-orange);
    transition: width 0.7s ease;
  }

  .feature-box:hover {
    transform: translateY(-5px);
  }

  .feature-box:hover::after {
    width: 100%;
  }

  .feature-icon {
    width: 60px;
    height: 60px;
    align-items: center;
    justify-content: center;
    filter: invert(50%) sepia(90%) saturate(400%) hue-rotate(10deg) brightness(1.1) contrast(1);
  }

  @keyframes slideUpFadeIn {
    0% {
      opacity: 0;
      transform: translateY(30px);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  @media (max-width: 767.98px) {
    .feature-box {
      text-align: center;
    }
  }
</style>
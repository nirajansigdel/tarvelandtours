<style>
  .contactsection {
    position: relative;
    background-color: #f8f9fa;
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
    min-height: 80vh;
    overflow: hidden;
  }
</style>

<section class=" container-fluid  contactsection position-relative text-white text-center py-5">
  <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.55);"></div>
  <div class="container position-relative z-1 justify-content-center align-items-center d-flex flex-column"
    style="min-height: 500px;">
    <div class="row col-md-8 justify-content-center align-items-center">
 <style>
  .text-warning{
    color: var(--bs-orange) !important;;
  }
 </style>

      <h2 class="extralarge mb-3">
        Start Planning Your Trip Now and <span class="text-warning">Get 30% Discount</span>
      </h2>

      <p class="lead fw-normal mb-4 px-2 px-md-5 text-center">
       We’re here to assist you with your travel plans and ensure you have an
        unforgettable experience. Let’s make your dream trip a reality!
      </p>

      <a href="{{ route('Contact') }}" class="btn btn-outline-light btn-lg py-2 rounded-pill fw-semibold col-md-3">
        Book Now
      </a>
    </div>
  </div>
</section>
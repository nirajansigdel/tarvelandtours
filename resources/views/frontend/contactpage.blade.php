@extends('frontend.layouts.master')

@section('content')
<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/contact.webp') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">connect with us</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    Contact
                </p>
            </div>
        </div>
    </section>
<style>
  .text-orange {
  color: #f26522 !important;
}
.bg-orange{
  background:#f26522;

}
</style>



<!-- Hero Contact Section -->
<section class=" container-fluid py-5 bg-white">
  <div class="container">
    <div class="row align-items-center g-4">
      <!-- Left Text -->
      <div class="col-md-5">
        <p class="heading  mb-2">Contact Us</p>
        <h2 class="fw-bold">We Would <span class="text-orange">Love To Connect!</span></h2>
        <p class="content-desc">Always here to support, guide, and connect with you. Feel free to reach out.</p>
        <a href="https://api.whatsapp.com/send?phone=9779851222693" class=" btn cta-button px-4 py-3 d-inline-flex align-items-center">
          <i class="bi bi-whatsapp me-2"></i> Whatsapp
        </a>
      </div>

      <!-- Right Image -->
      <div class="col-md-7 text-center row">
            <div class="col-md-4 text-center bg-white rounded shadow-sm p-4 mb-2" data-aos="zoom-in">
        <i class="fa-solid fa-location-dot  fa-2x mb-2"></i>
        <h5 class="fw-semibold mb-2">Office Address</h5>
        @if (!empty($sitesetting->office_address))
          @foreach ((array)json_decode($sitesetting->office_address) as $address)
            <p class="text-muted small mb-1">{{ $address }}</p>
          @endforeach
        @endif
      </div>

        <div class="col-md-4 text-center bg-white rounded shadow-sm p-4 mb-2" data-aos="zoom-in" data-aos-delay="100">
        <i class="fa-solid fa-phone fa-2x mb-2"></i>
        <h5 class="fw-semibold mb-2">Office Contact</h5>
        @if (!empty($sitesetting->office_contact))
          @foreach ((array)json_decode($sitesetting->office_contact) as $contact)
            <p class="text-muted small mb-1">{{ $contact }}</p>
          @endforeach
        @endif
      </div>

      <!-- Email -->
      <div class="col-md-4 text-center bg-white rounded shadow-sm p-4 mb-2" data-aos="zoom-in" data-aos-delay="200">
        <i class="fa-solid fa-envelope  fa-2x"></i>
        <h5 class="fw-semibold mb-2">Office Email</h5>
        @if (!empty($sitesetting->office_email))
          @foreach ((array)json_decode($sitesetting->office_email) as $email)
            <p class="text-muted small mb-1">{{ $email }}</p>
          @endforeach
        @endif
      </div>
      
      </div>
    </div>
  </div>
</section>


<!-- Appointment Booking -->
<section class=" container-fluid py-5 bg-white">
  <div class="container">
    <div class="row gx-5 align-items-stretch rounded shadow">
      
      <!-- Left Column -->
      <div class="col-md-4 bg-orange  text-white p-4 rounded-start d-flex flex-column justify-content-center">
        <h4 class="fw-bold mb-4">Book Virtual Appointment</h4>
        <ul class="list-unstyled">
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Volunteer Opportunities</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Join Our Mission</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Community Support Services</li>
          <li class="mb-3"><i class="fa-solid fa-circle-check me-2"></i> Internship & Job Programs</li>
          <li><i class="fa-solid fa-circle-check me-2"></i> Social Impact Initiatives</li>
        </ul>
      </div>

      <!-- Right Column - Form -->
      <div class="col-md-8 bg-white p-4 rounded-end">
        <form id="contactForm" method="POST" action="{{ route('Contact.store') }}">
          @csrf

          <div class="row g-3">
            <div class="col-md-6">
              <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" required value="{{ old('name') }}">
              @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-md-6">
              <input type="tel" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Phone Number" id="phoneInput" required>
              @error('phone_no')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="col-md-6">
              <input type="text" name="service" class="form-control @error('service') is-invalid @enderror" placeholder="Interested Service" value="{{ old('service') }}">
              @error('service')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12">
              <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="4" placeholder="Message" required>{{ old('message') }}</textarea>
              @error('message')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <div class="col-12 form-check">
              <input class="form-check-input" type="checkbox" id="agree" required>
              <label class="form-check-label" for="agree">
                I agree with the <a href="#" class="text-primary">Privacy Policy</a>.
              </label>
            </div>

            <div class="col-12">
              <button type="submit" class="btn cta-button px-4 py-3 rounded shadow">Book Appointment</button>
            </div>
          </div>

        </form>
      </div>

    </div>
  </div>
</section>

<!-- External Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css" />
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Optional AJAX Form Handling -->
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('contactForm');
    form?.addEventListener('submit', async (e) => {
      e.preventDefault();

      const formData = new FormData(form);

      try {
        const response = await fetch(form.action, {
          method: 'POST',
          body: formData
        });

        const data = await response.json();

        if (data.success) {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: data.message || 'Your appointment request has been submitted successfully!',
            confirmButtonColor: '#dc3545'
          });
          form.reset();
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            text: data.message || 'Please check your input and try again.',
            confirmButtonColor: '#dc3545'
          });
        }
      } catch (err) {
        Swal.fire({
          icon: 'error',
          title: 'Error',
          text: 'Something went wrong. Please try again.',
          confirmButtonColor: '#dc3545'
        });
      }
    });
  });
</script>

@endsection
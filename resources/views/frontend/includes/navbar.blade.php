<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<style>
  .navbar {
    background: transparent;
    border-bottom: 1px solid rgba(255, 255, 255, 1);
    position: absolute;
    left: 0;
    width: 100%;
    top:0px !important;
    padding:20px;
  }

  .lang-option {
    transition: color 0.3s ease;
    user-select: none;
  }

  .lang-active {
    background: var(--bs-yellow) !important;
    color: #ffffff !important;
  }

  .lang-inactive {
    background: var(--primary) !important;
    color: #ffffff !important;
  }

  /* Enhanced language toggle styling */
  .lang-toggle {
    background: var(--primary) !important;
    border: 1px solid #dee2e6;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
  }

  .lang-toggle .lang-option {
    font-size: 0.9rem;
    letter-spacing: 0.4px;
    transition: background-color 200ms ease, color 200ms ease;
    border-radius: 999px;
  }

  .lang-toggle .lang-option.lang-active {
    color: #ffffff !important;
    text-shadow: 0 1px 0 rgba(0, 0, 0, 0.12);
  }

  .lang-toggle .lang-option.lang-inactive {
    color: #ffffff !important;
  }

  .lang-toggle .lang-option:hover {
    filter: brightness(1.05);
  }

  .toplogo {
    width: auto;
    height: 70px;
    display: flex;
    align-items: center;
    gap: 20px;
  }

  .toplogo img {
    width: auto;
    height: 100%;
    object-fit: cover;
  }

  .header.sticky {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
  }

  .header {
    position: sticky;
    top: 0;
    background-color: #eeedf3;
    z-index: 1000;
  }

  .navbar-nav .nav-link {
    color: white !important;
    font-size: 18px;
    text-transform: capitalize;
    margin:0.7rem;
    
  }

  .navbar-nav .nav-link:hover {
    color: var(--bs-yellow) !important;
    border-radius: 5px;
    font-weight: 500;
  }

  .navbar-nav .nav-link.active {
    color: #fff !important;
    border-radius: 5px;
    font-weight: 500;
    background: var(--bs-yellow) !important;
  
  }

  .badge.bg-danger {
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 600;
    padding: 0;
    border: 2px solid white;
  }

  .offcanvas-body .nav-link {
    font-size: 18px;
    padding: 10px 0;
    color: black !important;
  }

  .offcanvas-body .nav-link:hover {
    color: #ef6b20;
  }

  @media (max-width: 767.98px) {
    .navbar-collapse.d-none.d-md-flex {
      display: none !important;
    }

    .lang-toggle-mobile {
      display: inline-flex !important;
      margin-right: 10px;
    }
  }

  @media (min-width: 768px) {
    .lang-toggle-mobile {
      display: none !important;
    }
  }

  @media (min-width: 992px) {
    .navbar .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }

    .navbar .dropdown-toggle::after {
      transform: rotate(180deg);
    }
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-md">
  <div class="container d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a class="navbar-brand toplogo" href="{{ route('index') }}">
      <img src="{{ asset('image/logo.jpg') }}" alt="Logo" />
    </a>

    <!-- Language Toggle (mobile) -->
    <div class="lang-toggle-mobile d-flex align-items-center">
      <div class="position-relative lang-toggle px-1 py-1 rounded-pill" style="width: 100px; background-color: transparent;">
        <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
          <a href="{{ route('language.switch', 'es') }}" id="langSpa" class="lang-option flex-fill text-center py-1 fw-semibold {{ app()->getLocale() === 'es' ? 'lang-active' : 'lang-inactive' }}">SPA</a>
          <a href="{{ route('language.switch', 'en') }}" id="langEng" class="lang-option flex-fill text-center py-1 fw-semibold {{ app()->getLocale() === 'en' ? 'lang-active' : 'lang-inactive' }}">ENG</a>
        </div>
      </div>
    </div>
<style>
  .navbar-toggler, .btn-close {
    border-color: white; /* white border */
  }

  .navbar-toggler-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
  }
  .btn-close{
    color: white !important;
    border-color: #ef6b20;
  }
</style>

    <!-- Hamburger Button -->
    <button class="navbar-toggler" style="color:white"  type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu"
      aria-controls="mobileMenu">
      <span class="navbar-toggler-icon " style="color:white"></span>
    </button>

    <!-- Desktop Menu -->
    <div class="collapse navbar-collapse justify-content-between d-none d-md-flex">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark " href="#" id="navbarDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('messages.introduction') }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('index') }}">{{ __('messages.Home') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('whyus') }}">{{ __('messages.why_us') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('Service') }}">{{ __('messages.services') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('About') }}">{{ __('messages.about') }}</a></li>

          </ul>
        </li>
        
        <li class="nav-item"><a class="nav-link text-dark" href="{{ route('Gallery') }}">{{ __('messages.gallery') }}</a></li>
        <li class="nav-item"><a class="nav-link text-dark "
            href=" {{ route('destinations.index.front') }}">{{ __('messages.Destination') }}</a></li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark " href="#" id="offerDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
            Offer
          </a>
          <ul class="dropdown-menu" aria-labelledby="offerDropdown">
            <li><a class="dropdown-item" href="{{ route('products.index.front') }}">{{ __('messages.promotions') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('products.index.front') }}">{{ __('messages.generaloffer') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('festivals.index.front') }}">{{ __('messages.festivaloffer') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('couples.index.front') }}">{{ __('messages.coupleoffer') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('groups.index.front') }}">{{ __('messages.groupoffer') }}</a></li>

          </ul>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link text-dark" href="#" data-bs-toggle="dropdown">Updates</a>
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="{{ route('events') }}">News & Events</a></li> -->
            <li><a class="dropdown-item" href="{{ route('Blogpostcategory') }}">{{ __('messages.blogs') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('career') }}">{{ __('messages.careernav')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('testimonails') }}">{{ __('messages.testimonials') }}</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link text-dark" href=" {{ route('Contact') }}">{{ __('messages.contact') }}</a></li>
      </ul>

      <!-- Language Toggle (desktop) -->
      <div class="d-flex align-items-center gap-3">
        <div class="position-relative lang-toggle px-1 py-1 rounded-pill"
          style="width: 100px; background-color: transparent;">
          <div class="d-flex justify-content-between align-items-center position-relative" style="z-index: 2;">
            <a href="{{ route('language.switch', 'es') }}" id="langSpa" class="lang-option flex-fill text-center py-1 fw-semibold {{ app()->getLocale() === 'es' ? 'lang-active' : 'lang-inactive' }}">SPA</a>
            <a href="{{ route('language.switch', 'en') }}" id="langEng" class="lang-option flex-fill text-center py-1 fw-semibold {{ app()->getLocale() === 'en' ? 'lang-active' : 'lang-inactive' }}">ENG</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<style>
  .offcanvas-header {
    background: var(--primary);
    color: white;
  }

   .btn-close.white-close {
    filter: invert(1) grayscale(100%) brightness(200%);
  } 
  
</style>

<!-- Mobile Menu -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobileMenu" aria-labelledby="mobileMenuLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="mobileMenuLabel">Menu</h5>
    <button type="button" class="btn-close white-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('About') }}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('whyus') }}">Why Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Contact') }}">Contact Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Gallery') }}">Gallery</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
          Offer
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=Post">Post</a></li>
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=Destination">Destination</a></li>
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=General">General</a></li>
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=Festival">Festival</a></li>
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=Couple">Couple</a></li>
          <li><a class="dropdown-item" href="{{ route('products.index.front') }}?type=Group">Group</a></li>
        </ul>
      </li> 


      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Service') }}">{{ __('messages.services') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('career') }}">Opportunity</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('events') }}">News & Events</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('Blogpostcategory') }}">Blogs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('faqs') }}">FAQs</a>
      </li>
    </ul>
  </div>
</div>

<!-- Language toggle styling -->
<style>
  .lang-option {
    text-decoration: none;
    color: inherit;
    display: block;
  }
  
  .lang-option:hover {
    text-decoration: none;
    color: inherit;
  }
  
  .lang-option.lang-active {
    background: var(--bs-yellow);
    color: #ffffff;
  }
  
  .lang-option.lang-inactive {
    background: var(--primary);
    color: #ffffff;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.lang-toggle').forEach(function (container) {
      var spa = container.querySelector('#langSpa') || container.querySelector('a[href*="language.switch"][href*="es"]');
      var eng = container.querySelector('#langEng') || container.querySelector('a[href*="language.switch"][href*="en"]');
      if (!spa || !eng) return;

      function activate(target) {
        if (target === spa) {
          spa.classList.add('lang-active');
          spa.classList.remove('lang-inactive');
          eng.classList.remove('lang-active');
          eng.classList.add('lang-inactive');
        } else {
          eng.classList.add('lang-active');
          eng.classList.remove('lang-inactive');
          spa.classList.remove('lang-active');
          spa.classList.add('lang-inactive');
        }
      }

      spa.addEventListener('click', function () { activate(spa); }, { passive: true });
      eng.addEventListener('click', function () { activate(eng); }, { passive: true });
    });
  });
</script>
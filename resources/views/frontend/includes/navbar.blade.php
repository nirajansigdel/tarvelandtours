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
    margin:0.5rem;
    
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
    padding: 6px 0 !important;
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
    /* Allow mega menu to be positioned relative to the full navbar width */
    .navbar .nav-item.dropdown {
      position: static;
    }
    .navbar .dropdown:hover .dropdown-menu {
      display: block;
      margin-top: 0;
    }

    .navbar .dropdown-toggle::after {
      transform: rotate(180deg);
    }
    /* Mega dropdown styles for desktop */
    /* Mega menu wrapper */
.dropdown-menu.mega-menu {
    width: 100%;
max-width: 100%;
    left: 50%;
    transform: translateX(-50%);
    padding: 30px 0;
    background: transparent;
    border: none;
    margin-top: 20px;
}

/* Glassmorphic inner container */
.mega-menu .mega-inner {
    background: rgba(255, 255, 255, 0.12);
    backdrop-filter: blur(14px);
    border-radius: 20px;
    padding: 28px;
    width: 100%;
    max-width: 1250px;
    margin: 0 auto;
    box-shadow: 0 18px 40px rgba(0, 0, 0, 0.15);
    display: flex;
    justify-content: center;
    gap: 22px;
    height: auto;
    border: 1px solid rgba(255,255,255,0.25);
    animation: megaFadeIn .3s ease;
}

/* Fade-in animation */
@keyframes megaFadeIn {
    from { opacity:0; transform:translateY(10px);}
    to {opacity:1; transform:translateY(0);}
}

/* Card grid */
.mega-card-grid {
    display: flex;
    gap: 22px;
    justify-content: center;
    align-items: stretch;
    width: 100%;
}

/* Actual card */
.mega-card {
    position: relative;
    display: flex;
    flex-direction: column;
    width: 280px;
    background: #ffffff;
    border-radius: 18px;
    overflow: hidden;
    text-decoration: none;
    color: #212529;
    
    /* Glow border */
    border: 2px solid transparent;
    background-clip: padding-box;

    /* Shadow */
    box-shadow: 0 8px 16px rgba(0,0,0,0.12);

    /* Animation */
    transition: transform .25s ease, box-shadow .25s ease, border .25s ease;
}

/* Hover lift + glow */
.mega-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 18px 32px rgba(0,0,0,0.22);
    border-color: rgba(255, 179, 80, 0.85);   /* Golden glow */
}

/* Card image */
.mega-thumb {
    width: 100%;
    height: 180px;
    background-size: cover;
    background-position: center;
    border-bottom: 1px solid #eaeaea;
}

/* Title */
.mega-card-title {
    font-size: 1.2rem;
    font-weight: 700;
    margin: 14px 18px 6px;
    color: #1d1d1d;
}

/* Description */
.mega-card-desc {
    font-size: 0.92rem;
    color: #6c757d;
    margin: 0 18px 14px;
    line-height: 1.35;
}

/* Button */
.mega-card-btn {
    margin: 0 18px 18px;
    padding: 10px 12px;
    background: linear-gradient(135deg, #ef6b20, #ff914d);
    color: #fff;
    text-align: center;
    border-radius: 10px;
    font-weight: 600;
    transition: all .25s ease;
}

.mega-card-btn:hover {
    background: linear-gradient(135deg, #d55a00, #ff7a22);
    box-shadow: 0 4px 14px rgba(239, 107, 32, 0.45);
}

/* Premium label tag */
.mega-label {
    position: absolute;
    top: 14px;
    left: 14px;
    background: rgba(0,0,0,0.65);
    padding: 5px 12px;
    color: #fff;
    font-size: .8rem;
    font-weight: 600;
    border-radius: 50px;
    backdrop-filter: blur(6px);
}

/* Mobile responsiveness */
@media(max-width: 992px){
    .mega-menu .mega-inner {
        flex-wrap: wrap;
        height: auto;
        padding: 20px;
    }
    .mega-card {
        width: 100%;
        max-width: 350px;
    }
    .mega-thumb {
        height: 160px;
    }
}
</style>

<!-- Navbar -->
@php
  use App\Models\Product;
  use App\Models\Service;
  use App\Models\WhyUs;
  use App\Models\About;
  use App\Models\CoverImage;
use App\Models\BlogPostsCategory;
  use App\Models\Career;
  use App\Models\Testimonial;

  // Helper to get first product image url
  $firstProductImage = function (?Product $p) {
    if (!$p) return null;
    $imgs = is_array($p->images) ? $p->images : [];
    if (count($imgs) > 0) {
      return asset('uploads/products/' . $imgs[0]);
    }
    return null;
  };

  // Offer thumbnails (one latest item per type)
  $promoProd = Product::where('status', true)->hasType('Post')->latest()->first();
  $promoThumb = $firstProductImage($promoProd);
  
    $destination = Product::where('status', true)->hasType('Destination')->latest()->first();
  $generaldestination = $firstProductImage($destination);

  $generalProd = Product::where('status', true)->hasType('General')->latest()->first();
  $generalThumb = $firstProductImage($generalProd);

  $festivalProd = Product::where('status', true)->hasType('Festival')->latest()->first();
  $festivalThumb = $firstProductImage($festivalProd);

  $coupleProd = Product::where('status', true)->hasType('Couple')->latest()->first();
  $coupleThumb = $firstProductImage($coupleProd);

  $groupProd = Product::where('status', true)->hasType('Group')->latest()->first();
  $groupThumb = $firstProductImage($groupProd);

  // Introduction thumbnails
  $service = Service::latest()->first();
  $serviceThumb = $service && $service->image ? asset('uploads/service/' . $service->image) : null;

  $why = WhyUs::latest()->first();
  $whyThumb = $why && $why->image ? asset('uploads/whyus/' . $why->image) : null;

  $about = About::first();
  $aboutThumb = $about && $about->image ? asset('uploads/about/' . $about->image) : null;

  $cover = CoverImage::latest()->first();
  $homeThumb = null;
  if ($cover) {
    $coverImgs = is_array($cover->image) ? $cover->image : [];
    if (count($coverImgs) > 0) {
      $homeThumb = asset('uploads/coverimage/' . $coverImgs[0]);
    }
  }

  // Updates thumbnails
   $blog = BlogPostsCategory::latest()->first();
  $blogsThumb = $blog && $blog->image ? asset('uploads/blogpostcategory/' . $blog->image) : null;

  $careerItem = Career::where('status', true)->latest()->first();
  $careerThumb = $careerItem ? $careerItem->image_url : null;

  $testi = Testimonial::latest()->first();
  $testimonialThumb = $testi && $testi->image ? asset('uploads/testimonial/' . $testi->image) : null;
@endphp
<nav class="navbar navbar-expand-md">
  <div class="container d-flex align-items-center justify-content-between">
    <!-- Logo -->
    <a class="navbar-brand toplogo" href="{{ route('index') }}">
      <img src="{{ asset('image/logo1.png') }}" alt="Logo" />
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
          <div class="dropdown-menu mega-menu" aria-labelledby="navbarDropdown">
            <div class="container-fluid mega-inner">
              <div class="mega-card-grid">
                <a class="mega-card" href="{{ route('index') }}">
                  <div class="mega-thumb" @if($homeThumb) style="background-image: url('{{ $homeThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.Home') }}</div>
                </a>
                <a class="mega-card" href="{{ route('whyus') }}">
                  <div class="mega-thumb" @if($whyThumb) style="background-image: url('{{ $whyThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.why_us') }}</div>
                </a>
                <a class="mega-card" href="{{ route('Service') }}">
                  <div class="mega-thumb" @if($serviceThumb) style="background-image: url('{{ $serviceThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.services') }}</div>
                </a>
                <a class="mega-card" href="{{ route('About') }}">
                  <div class="mega-thumb" @if($aboutThumb) style="background-image: url('{{ $aboutThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.about') }}</div>
                </a>
              </div>
            </div>
          </div>
        </li>
        
       
         <li class="nav-item"><a class="nav-link text-dark" href="{{ route('blogs') }}">{{ __('messages.blogs') }}</a></li>
        <li class="nav-item"><a class="nav-link text-dark "
            href=" {{ route('products.index.front') }}">{{ __('messages.activities') }}</a></li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-dark " href="#" id="offerDropdown" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">
     {{ __('messages.trekking') }}
          </a>
          <div class="dropdown-menu mega-menu" aria-labelledby="offerDropdown">
            <div class="container-fluid mega-inner">
              <div class="mega-card-grid">
                <a class="mega-card" href="{{ route('destinations.index.front') }}">
                  <div class="mega-thumb" @if($generaldestination) style="background-image: url('{{ $generaldestination }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.everest') }}</div>
                </a>
                <a class="mega-card" href="{{ route('general.index.front') }}">
                  <div class="mega-thumb" @if($generalThumb) style="background-image: url('{{ $generalThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.annapurna') }}</div>
                </a>
                <a class="mega-card" href="{{ route('festivals.index.front') }}">
                  <div class="mega-thumb" @if($festivalThumb) style="background-image: url('{{ $festivalThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.langtang') }}</div>
                </a>
                <a class="mega-card" href="{{ route('couples.index.front') }}">
                  <div class="mega-thumb" @if($coupleThumb) style="background-image: url('{{ $coupleThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.adventure') }}</div>
                </a>
                <a class="mega-card" href="{{ route('groups.index.front') }}">
                  <div class="mega-thumb" @if($groupThumb) style="background-image: url('{{ $groupThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.dolpa') }}</div>
                </a>
              </div>
            </div>
          </div>
        </li>


        <li class="nav-item dropdown">
          <a class="nav-link text-dark" href="#" data-bs-toggle="dropdown">Updates</a>
          <div class="dropdown-menu mega-menu">
            <div class="container-fluid mega-inner">
              <div class="mega-card-grid">
                <a class="mega-card" href="{{ route('career') }}">
                  <div class="mega-thumb" @if($careerThumb) style="background-image: url('{{ $careerThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.careernav')}}</div>
                </a>
                <a class="mega-card" href="{{ route('testimonails') }}">
                  <div class="mega-thumb" @if($testimonialThumb) style="background-image: url('{{ $testimonialThumb }}'); background-size: cover; background-position: center;" @endif></div>
                  <div class="mega-card-title">{{ __('messages.testimonials') }}</div>
                </a>
              </div>
            </div>
          </div>
        </li>
         <li class="nav-item"><a class="nav-link text-dark" href="{{ route('Gallery') }}">{{ __('messages.gallery') }}</a></li>
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
        <a class="nav-link" href="{{ route('blogs') }}">Blogs</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index.front') }}?type=Post">{{ __('messages.activities')}}</a>
      </li> <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index.front') }}?type=Destination">{{ __('messages.everest')}}</a>
      </li> <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index.front') }}?type=General">{{ __('messages.langtang') }}</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('products.index.front') }}?type=Festival">{{ __('messages.annapurna') }}</a>
      </li>
      </li> <li class="nav-item">
        <a class="nav-link" href="{{ route('products.index.front') }}?type=Couple">{{ __('messages.adventure') }}</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link"  href="{{ route('products.index.front') }}?type=Group">{{ __('messages.dolpa') }}</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
          Information
        </a>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{ route('About') }}">About Us</a></li>
          <li><a class="dropdown-item" href="{{ route('Service') }}">{{ __('messages.services') }}</a></li>
          <li><a class="dropdown-item" href="{{ route('events') }}" >News & Events</a></li>
          <li><a class="dropdown-item"  href="{{ route('whyus') }}" >Why Us</a></li>
          <li><a class="dropdown-item"  href="{{ route('Gallery') }}">Gallery</a></li>
          <li><a class="dropdown-item" href="{{ route('career') }}" >Opportunity</a></li>
          <li><a class="dropdown-item" href="{{ route('faqs') }}">FAQs</a></li>
        </ul>
      </li> 
      
       <li class="nav-item">
        <a class="nav-link" href="{{ route('Contact') }}">Contact Us</a>
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
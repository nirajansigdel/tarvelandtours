
<footer class="footer-section">
    <div class="container">
        <div class="row  text-md-start mb-5">

            <!-- Column 1 -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 100ms;">
                <h5>{{ __('messages.about_us') }}</h5>
                <div class="footer-menu">
                    <a href="{{ route('Service') }}">{{ __('messages.services') }}</a>
                    <a href="{{ route('blogs') }}">{{ __('messages.blogs') }}</a>
                    <a href="{{ route('Contact') }}">{{ __('messages.contact_us') }}</a>
                    <a href="{{ route('Gallery') }}">{{ __('messages.gallery') }}</a>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 200ms;">
                <h5>{{ __('messages.Explore') }}</h5>
                <div class="footer-menu">
                     <li><a class="dropdown-item" href="{{ route('products.index.front') }}">{{ __('messages.everest') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('festivals.index.front') }}">{{ __('messages.annapurna') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('couples.index.front') }}">{{ __('messages.langtang') }}</a></li>
            <li><a class="dropdown-item" href="{{ route('groups.index.front') }}">{{ __('messages.dolpa') }}</a></li>
                    
                </div>
            </div>

            <!-- Column 3 (Social Links) -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 300ms;">
                <h5>{{ __('messages.connect') }} </h5>
                <div class="row">
                    <div class="col-md-12">
                        <p> 
                    {{ __('messages.need_help') }}
                        </p>
                        <a href="{{ route('Contact') }}" class="btn btn-outline-light btn-lg py-2  rounded-pill fw-semibold px-4 ">{{ __('messages.book_now') }}</a>
                    </div>
                    <div class="col-md-5 footer-social d-flex mt-3 text-decoration-none">
                    @if($sitesetting && $sitesetting->facebook_link)
                        <a href="{{ $sitesetting->facebook_link }}"><i class="fab fa-facebook-f"></i></a>
                    @endif
                    @if($sitesetting && $sitesetting->instagram_link)
                        <a href="{{ $sitesetting->instagram_link }}"><i class="fab fa-instagram"></i></a>
                    @endif
                    @if($sitesetting && $sitesetting->linkedin_link)
                        <a href="{{ $sitesetting->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                    @endif
                    @if($sitesetting && $sitesetting->snapchat_link)
                        <a href="{{ $sitesetting->snapchat_link }}"><i class="fab fa-snapchat-ghost"></i></a>
                    @endif
                    @if($sitesetting && $sitesetting->x_link)
                    @endif
                </div>

                </div>
                
            </div>
        </div>

        <div class="row align-items-center justify-content-between footer-bottom reveal-up " style="--reveal-delay: 400ms;">
            <!-- Logo -->
            <div class="col-md-4 text-center text-md-start mb-3 mb-md-0">
                <div class="footer-logo">
                    <img src="{{ asset('image/logo.avif') }}" alt="Logo">
                </div>
            </div>

            <!-- Copyright -->
            <div class="col-md-4 reveal-up" style="--reveal-delay: 400ms;">
                © Unique Nepal Trek And Expedition {{ now()->year }}. {{ __('messages.alright') }}
            </div>
        </div>
    </div>
</footer>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const targets = document.querySelectorAll('.reveal-up');
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            targets.forEach(el => observer.observe(el));
        } else {
            targets.forEach(el => el.classList.add('is-visible'));
        }
    });
</script>


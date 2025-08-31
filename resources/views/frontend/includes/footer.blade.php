<style>
.footer-section {
    background: #0c2544;
    color: #e0e0e0;
    font-family: 'Segoe UI', sans-serif;
    padding: 50px 0 20px;
}

.footer-section h5 {
    color:var(--bs-orange);
    font-weight: 600;
    margin-bottom: 20px;
}

.footer-logo img {
    max-height: 60px;
    filter: brightness(0) invert(1);
}

.footer-menu a {
    color: #e0e0e0;
    text-decoration: none;
    display: block;
    margin-bottom: 8px;
    transition: color 0.3s;
}

.footer-menu a:hover {
    color: #ffffff;
}

.footer-social a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    margin-right: 10px;
    background: #152d56;
    color: #f26522;
    border-radius: 50%;
    font-size: 18px;
    transition: all 0.3s ease;
}

.footer-social a:hover {
    background:var(--bs-orange);
    color: #fff;
    transform: translateY(-5px);
    box-shadow: 0 4px 15px rgba(242, 101, 34, 0.7);
}

.footer-bottom {
    border-top: 1px solid #2c3e50;
    margin-top: 30px;
    padding-top: 15px;
    font-size: 14px;
    text-align: center;
}

.reveal-up {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.reveal-up.is-visible {
    opacity: 1;
    transform: none;
}
</style>
<footer class="footer-section">
    <div class="container">
        <div class="row  text-md-start mb-5">

            <!-- Column 1 -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 100ms;">
                <h5>About Us</h5>
                <div class="footer-menu">
                    <a href="{{ route('Service') }}">Our Services</a>
                    <a href="{{ route('Blogpostcategory') }}">Blog</a>
                    <a href="{{ route('events') }}">News & Events</a>
                    <a href="{{ route('Gallery') }}">Gallery</a>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 200ms;">
                <h5>Explore</h5>
                <div class="footer-menu">
                    <a href="#">Our Mission</a>
                    <a href="#">Our Team</a>
                    <a href="#">Partners</a>
                    <a href="#">Contact Us</a>
                </div>
            </div>

            <!-- Column 3 (Social Links) -->
            <div class="col-md-4 mb-4 reveal-up" style="--reveal-delay: 300ms;">
                <h5>Connect with Us</h5>
                <div class="row">
                    <div class="col-md-12">
                        <p> 
                    Need help? Our team is available 24/7 — get in touch now and we’ll be happy to assist you.
                        </p>
                        <a href="{{ route('Contact') }}" class="btn btn-outline-light btn-lg py-2  rounded-pill fw-semibold px-4 ">Book Now</a>
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
                © tarvel and tour Nepal {{ now()->year }}. All Rights Reserved.
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


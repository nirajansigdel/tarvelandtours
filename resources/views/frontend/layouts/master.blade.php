<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    

@php

@endphp



@include('frontend.includes.head')

<body>
    

    @include('frontend.includes.navbar')

    @yield('content')
    @include('frontend.includes.footer')

    <style>
        .whatsapp-chat-container {
            position: fixed;
            bottom: 1%;
            right: 1%;
            z-index: 999;
            transition: transform 0.3s ease-in-out;
            transform: scale(1);
        }

        .whatsapp-chat {
            display: block;
        }

        .whatsapp-chat img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: transform 0.3s ease-in-out;
        }

        .whatsapp-chat img:hover {
            transform: scale(1.1);
        }

        /* Ensure proper spacing between content and footer */
        .pb-8 {
            padding-bottom: 5rem !important;
        }

        .pt-8 {
            padding-top: 5rem !important;
        }

        /* Add minimum height to main content area */
        main {
            min-height: calc(100vh - 400px); /* Adjust based on your header/footer heights */
        }

        /* Ensure footer doesn't stick to content */
        .footer-spacer {
            height: 3rem;
            background: transparent;
        }

        /* Additional spacing utilities */
        .mb-footer {
            margin-bottom: 4rem !important;
        }

        .pb-footer {
            padding-bottom: 4rem !important;
        }

        /* Ensure content area has proper height */
        .content-wrapper {
            min-height: calc(100vh - 300px);
            padding-bottom: 2rem;
        }

        /* Footer separation */
        footer {
            margin-top: auto;
            position: relative;
        }

        /* Container spacing */
        .container {
            margin-bottom: 2rem;
        }

        /* Card spacing */
        .card {
            margin-bottom: 1.5rem;
        }

        /* Section spacing */
        section {
            margin-bottom: 3rem;
        }
    </style>

    
    <!-- WhatsApp Chat Button -->
    <div class="whatsapp-chat-container" id="whatsappChatContainer">
        <div class="whatsapp-chat">
            <a href="https://api.whatsapp.com/send?phone=9779851222693" target="_blank">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/WhatsApp.svg/1200px-WhatsApp.svg.png"
                    alt="WhatsApp Chat" width="50" height="50">
            </a>
        </div>
    </div>

    <!-- Join Form Modal -->
    <div class="modal fade" id="joinFormModal" tabindex="-1" aria-labelledby="joinFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    @include('frontend.includes.joinform')
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            var scrollPosition = window.scrollY;

            if (scrollPosition > 100) {
                document.getElementById('whatsappChatContainer').style.display = 'block';
            } else {
                document.getElementById('whatsappChatContainer').style.display = 'none';
            }
        });

        // Handle all "Join Now" buttons
        document.addEventListener('DOMContentLoaded', function() {
            // Add click event listener to all elements with join-now-btn class
            document.querySelectorAll('.join-now-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const modal = new bootstrap.Modal(document.getElementById('joinFormModal'));
                    modal.show();
                });
            });
            
            // Initialize AOS (Animate On Scroll)
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 800,
                    easing: 'ease-in-out',
                    once: true
                });
            }
        });
    </script>

</body>

</html>

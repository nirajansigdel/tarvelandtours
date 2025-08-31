@extends('frontend.layouts.master')

@section('content')

    <!-- ========================== -->
    <!-- Inline Styles for this Page -->
    <!-- ========================== -->
    <style>
        /* ========== Global ========== */
        .highlighted {
            color: var(--primary);
            position: relative;
        }

        .highlighted::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 4px;
            background: var(--primary);
            left: 0;
            bottom: -6px;
            border-radius: 2px;
        }

        .tname {
            font-size: 1.5rem;
            color: #222;
            text-transform: capitalize;
        }






        /* ========== Mission Section ========== */
        .mission-card {
            background-color: #fff;
            border-left: 4px solid var(--primary);
            border-radius: 8px;
            transition: all 0.3s ease;
            min-height: 30vh;
        }

        .mission-card:hover {
            background-color: #f0f8ff;
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.1);
        }

        /* ========== CEO Typing ========== */
        #typing-text {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
        }

        /* ========== Directors Section ========== */
        .directors-section {
            background-color: #f7f9fc;
        }

        .directors-title {
            font-size: 2.5rem;

        }

        .directors-description {
            font-size: 1rem;
            line-height: 1.7;
            color: #666;
        }

        .director-card {
            transition: transform 0.1s ease;

        }

        .director-card:hover {
            transform: translateY(0px);
        }

        .director-image-wrapper {
            position: relative;


        }

        .director-image-wrapper img {
            width: 100%;
            object-fit: cover;
            height: 50vh;
        }

        .badge-custom {
            position: absolute;
            padding: 12px;
            font-size: 0.75rem;
            border-radius: 20px;
            animation: popUp 0.6s ease-in-out;
            width: 150px;
            height: 5vh;
        }

        .badge-role {
            bottom: -10px;
            left: -10px;
            background-color: #ffc107;
            color: #212529;
            transform: rotate(-5deg);
        }

        .badge-position {
            bottom: -10px;
            right: -10px;
            background-color: #dc3545;
            color: white;
            transform: rotate(5deg);
        }

        @keyframes popUp {
            from {
                opacity: 0;
                transform: translateY(20px) scale(0.9);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* ========== Team Section ========== */
        .teammember-section {
            background-color: #f9f9f9;
            transform: translateY(200px);
            transition: opacity 1.6s ease-out, transform 1.6s ease-out;
        }

        .teammember-section.visible {
            opacity: 1;
            transform: translateY(0);
        }






        .team-card {
            border: 1px solid #eee;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .team-details {
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .team-details .badge {
            padding: 6px 12px;
            font-size: 0.85rem;
            font-weight: 500;
            border-radius: 20px;
        }
    </style>


    <!-- ========== Hero Section ========== -->
    <!-- Testimonials Header Section -->
    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/check.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">About us</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    About
                </p>
            </div>
        </div>
    </section>



    <!-- ========== Mission Section ========== -->
    <section class="container-fluid py-5 bg-soft-blue">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4">
                        <h3 class="mb-3">{{trans('messages.sp_mission') }}</h3>

                        <h3 class="mb-3">{{ __('messages.mission') }}
                        </h3>

                        <p class="xs-text-des">{{ trans('messages.mission_cont') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4">
                        <h3 class="mb-3">{{ __('messages.sp_vision') }}</h3>
                        <h3 class="mb-3">{{ __('messages.vision') }}</h3>
                        <p class="xs-text-des">{{ trans('messages.vision_cont') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="mission-card p-4">
                        <h3 class="mb-3">{{ trans('messages.value') }}</h3>
                        <p class="xs-text-des">{{ trans('messages.value_cont') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .section-title {
            color: #f26522;
            font-weight: 600;
        }

        .main-heading {
            font-weight: 700;
            font-size: 2.5rem;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #f26522;
            margin-bottom: 10px;
        }

        .feature-title {
            font-size: 1.1rem;
            font-weight: 400;
            width: 100%;
        }


        .service-img {
            width: 100%;
            height: 85vh;
            object-fit: cover;

        }

        @media (max-width: 768px) {
            .main-heading {
                font-size: 2rem;
            }

            .feature-title {
                font-size: 1rem;
            }

            .feature-icon {
                font-size: 2rem;
            }
        }
    </style>


    <div class="container py-5">
        <div class="row align-items-center justify-content-between">
            <!-- Left Content -->
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
                <a href="#" class="btn cta-button">View Destination</a>
            </div>

            <!-- Right Image -->
            <div class="col-lg-5 text-center">
                <div class="service-img img-fluid bg-light d-flex align-items-center justify-content-center" style="height: 300px;">
    <i class="fas fa-mountain fa-3x text-muted"></i>
</div>
            </div>
        </div>
    </div>




    <!-- ========== CEO Section with Typing Animation ========== -->
    <section class="aboutherosection py-5 directors-section">
        <div class="container">
            <div class="row align-items-center mx-md-5">
                <div class="col-md-6 order-md-2" data-aos="fade-left" data-aos-delay="100">
                    <h3 class="pt-4 mb-4 fw-bold">CEO Message</h3>
                    <p id="typing-text"></p>
                    <div id="full-content" style="display:none;" class="xs-text-des">
                        {{ app()->getLocale() === 'ne' ? $about->ceo_message_ne : $about->ceo_message }}
                        {!! app()->getLocale() === 'ne' ? $about->content_ne : $about->content !!}
                    </div>
                </div>
                <div class="col-md-6 order-md-1 text-center" data-aos="fade-right" data-aos-delay="400">
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="CEO Image"
                        style="max-width: 80%; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); height: 400px;">
                    </>
                </div>
            </div>
    </section>

    <!-- ========== Directors Section ========== -->
    <section class="container-fluid py-5 bg-soft-blue ">
        <div class="container text-center">
            <div class="directors-header mb-5">
                <h2 class="Extralarge">🌟 Meet Our Team 🌟</h2>
                <p class="section-subtitle">
                    Our board brings expertise and heart to every decision, shaping a better Nepal for future generations.
                </p>
            </div>
            <div class="row justify-content-center">
                @foreach ($teams as $team)
                    <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                        <div class="director-card bg-white rounded shadow text-center">

                            <!-- Image -->
                            <div class="director-image-wrapper ">
                                <img src="{{ $team->image ? asset('uploads/team/' . $team->image) : asset('images/girl.jpg') }}"
                                    alt="{{ $team->name }}" class="rounded-top">
                            </div>


                            <!-- Gradient Info Box -->
                            <div class="gradient-box text-black bg-white rounded-3 p-4 mx-auto" style="text-align: left;">
                                <h5 class="tname fw-bold mb-2 text-capitalize">{{ $team->name }}</h5>
                                <p class="xs-text-des mb-1 text-left text-capitalize">Board
                                    Member/{{ $team->position }}/{{ $team->role }}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>


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
    <style>
        .text-warning {
            color: var(--bs-orange) !important;
            ;
        }

        /* Remove background & border */
        .custom-accordion-button {
            background-color: transparent;
            box-shadow: none;
            color: #000;
            font-weight: 600;
            padding: 1rem 0;
            transition: color 0.3s ease;
        }

        /* Change text color when open */
        .custom-accordion-button:not(.collapsed) {
            color: #f7941d;

        }

        /* Replace default caret with plus */
        .custom-accordion-button::after {
            content: '+';
            font-size: 1.5rem;
            transform: none;
            background-image: none !important;
            margin-left: auto;
            transition: transform 0.3s ease;
            bottom: none;
        }

        /* Change plus to minus when expanded */
        .custom-accordion-button:not(.collapsed)::after {
            content: '−';
            /* Unicode minus */
            color: #f7941d;
        }

        .addbg {
            background: var(--white);
        }
    </style>
    <section class="container-fluid contactsection position-relative text-white text-center py-5">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.55);"></div>
        <div class="container position-relative z-1 justify-content-center align-items-center d-flex flex-column "
            style="min-height: 500px;">
            <div class="row col-md-10 justify-content-center align-items-center addbg p-2 py-4">
                <h2 class="content-topheading mb-4">
                    FAQ
                </h2>
                <h1 class="extarlarge text-center text-dark mb-5">
                    Have Answers, Will Travel.
                </h1>

                <!-- Accordion Start -->




                <div class="accordion col-md-10 text-start" id="tripAccordion">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="heading{{$index}}">
                                <button class="accordion-button collapsed custom-accordion-button px-2" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="false"
                                    aria-controls="collapse{{$index}}">
                                    {{$faq->heading}}
                                </button>
                            </h2>
                            <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}"
                                data-bs-parent="#tripAccordion">
                                <div class="accordion-body text-muted">
                                    {{ $faq->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </section>








    <!-- ========== External Scripts ========== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1500,
            easing: 'ease-in-out-cubic',
            once: true,
            mirror: false,
            offset: 150
        });

        document.addEventListener('DOMContentLoaded', () => {
            const fullContent = document.getElementById('full-content').innerText.trim();
            const typingText = document.getElementById('typing-text');
            let index = 0;

            function type() {
                if (index < fullContent.length) {
                    typingText.innerHTML += fullContent.charAt(index);
                    index++;
                    setTimeout(type, 50);
                }
            }

            type();

            // Reveal team section
            const teamSection = document.querySelector('.teammember-section');
            function revealSection() {
                const rect = teamSection.getBoundingClientRect();
                const windowHeight = window.innerHeight || document.documentElement.clientHeight;

                if (rect.top <= windowHeight * 0.9) {
                    teamSection.classList.add('visible');
                    window.removeEventListener('scroll', revealSection);
                }
            }
            window.addEventListener('scroll', revealSection);
            revealSection();
        });
    </script>
@endsection
@extends('frontend.layouts.master')


<head>
    <title>{{ $aboutmeta?->title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $aboutmeta?->description ?? '' }}">

</head>


@section('content')


    <!-- ========== Hero Section ========== -->
    <!-- Testimonials Header Section -->
    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/check.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <p class="fw-bold display-4">{{ __('messages.about_us') }}</p>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">{{ __('messages.Home') }}</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ __('messages.about_us') }}
                </p>
            </div>
        </div>
    </section>

    <!-- ========== Mission Section ========== -->
    <section class="container-fluid py-5 bg-soft-blue">
        <div class="container">
            <div class="row text-center">

                @foreach ($missionVisionValues as $mvv)
                    <div class="col-md-4 mb-4 ">
                        <div class="mission-card p-4">
                            <h3 class="mb-3">{{$mvv->getTranslated('heading') }}
                            </h3>
                            <p class="xs-text-des">{{$mvv->getTranslated('description')}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <div class="container py-5">
        <div class="row align-items-center justify-content-between">
            <!-- Left Content -->
            <div class="col-lg-6 mb-4 mb-lg-0">
                
                <p class="extralarger mb-3">{{ __('messages.about_us') }}</p>
                @php
                    $text = $about->getTranslated('description') ?? 'No description available.';
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
                <a href="#" class="btn cta-button">{{ __('messages.view_destination') }}</a>
            </div>

            <!-- Right Image -->
            <div class="col-lg-5 position-relative d-flex justify-content-center">
                <div class="col-md-10">
                    <!-- Image -->
                    <img src="{{ asset('uploads/about/' . $about->image) }}" alt="Service"
                        class="img-fluid rounded shadow service-img">

                    <!-- Experience Badge -->
                    <!-- Experience Circle (on top) -->
                    <div class="position-absolute expercircle text-white rounded-circle d-flex flex-column justify-content-center align-items-center fw-bold"
                        style="width: 180px; height: 180px; bottom:46px; left: -60px; z-index: 2;">
                        <div style="font-size:40px;">15+</div>
                        <div style="font-size:16px; text-align: center;">{{ __('messages.years_experience') }}</div>
                    </div>

                    <!-- Customers Banner (under the circle) -->
                    <div class="position-absolute text-white text-center py-4 px-3"
                        style="background-color: #0E2F57; bottom: -36px; width:444px; border-radius: 6px; z-index: 1;">
                        <div class="fw-bold" style="font-size:40px;">1K+</div>
                        <small class="xs-text-des">{{ __('messages.customize_service') }}</small>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>




    <!-- ========== CEO Section with Typing Animation ========== -->

    <!-- AOS Initialization -->
    <script>
        AOS.init({
            duration: 1500,
            easing: 'ease-in-out-cubic',
            once: true,
            mirror: false,
            offset: 150
        });
    </script>

    <!-- CEO Message Section -->
    <section class="aboutherosection py-5 directors-section">
        <div class="container">
            <div class="row align-items-center mx-md-5">

                @foreach ($message as $index => $ceoms)
                    <div class="col-md-6 order-md-2" data-aos="fade-left" data-aos-delay="100">
                        <h3 class="pt-4 mb-4 fw-bold">{{ __('messages.CEO_Message') }}</h3>

                        <!-- Typing Text Output -->
                        <p id="typing-text-{{ $index }}"></p>

                        <!-- Hidden Full Message -->
                        <div id="full-content-{{ $index }}" class="xs-text-des" style="display: none;">
                            {{ $ceoms->getTranslated('message') }}
                        </div>
                    </div>

                    <div class="col-md-5 order-md-1 text-center" data-aos="fade-right" data-aos-delay="400">
                        <img src="{{ asset('uploads/message/' . $ceoms->image) }}" alt="CEO Image"
                            style="max-width: 80%; border-radius: 12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); height: 400px;">
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    <!-- Typing Effect Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Loop over all messages
            @foreach ($message as $index => $ceoms)
                const fullContent{{ $index }} = document.getElementById('full-content-{{ $index }}').innerText.trim();
                const typingText{{ $index }} = document.getElementById('typing-text-{{ $index }}');
                let index{{ $index }} = 0;

                function type{{ $index }}() {
                    if (index{{ $index }} < fullContent{{ $index }}.length) {
                        typingText{{ $index }}.innerHTML += fullContent{{ $index }}.charAt(index{{ $index }});
                        index{{ $index }}++;
                        setTimeout(type{{ $index }}, 50);
                    }
                }

                type{{ $index }}();
            @endforeach
            });
    </script>



    <!-- ========== Directors Section ========== -->
    <section class="container-fluid py-5 bg-soft-blue ">
        <div class="container text-center">
            <div class="directors-header mb-5">
                <p class="extralarger mb-3">{{ __('messages.OurTeams') }}</p>
                <p class="section-subtitle">
                   {{ __('messages.OurTeams_sub') }}
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
                                    Member/{{ $team->getTranslated('position') }}/{{ $team->getTranslated('role') }}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <section class="container-fluid contactsection position-relative text-white text-center py-5">
        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.55);"></div>
        <div class="container position-relative z-1 justify-content-center align-items-center d-flex flex-column "
            style="min-height: 500px;">
            <div class="row col-md-10 justify-content-center align-items-center addbg p-2 py-4">
                <h2 class="content-topheading mb-4">
                    {{ __('messages.faqs') }}
                </h2>
                <p class="extarlarge text-center text-dark mb-5">
                    {{ __('messages.faqs_sub') }}
                </p>

                <!-- Accordion Start -->




                <div class="accordion col-md-10 text-start" id="tripAccordion">
                    @foreach ($faqs as $index => $faq)
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="heading{{$index}}">
                                <button class="accordion-button collapsed custom-accordion-button px-2" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="false"
                                    aria-controls="collapse{{$index}}">
                                    👉 {{$faq->getTranslated('question')}}
                                </button>
                            </h2>
                            <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}"
                                data-bs-parent="#tripAccordion">
                                <div class="accordion-body text-muted">
                                    {{ $faq->getTranslated('answer') }}
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
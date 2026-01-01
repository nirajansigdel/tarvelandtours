@extends('frontend.layouts.master')




<head>
    <title> {{ $service->title }} {{ $singleservicemeta?->title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $singleservicemeta?->description ?? '' }}">

</head>

@section('content')
    <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/gallery.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">{{ $service->title }}</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">{{ __('messages.Home') }}</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ $service->title }}
                </p>
            </div>
        </div>
    </section>
    <section class="sample_page py-5 bg-white">
        <div class="container">
            <div class="row gx-5 gy-4">
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="scrollable-content">
                        <div class="overflow-hidden rounded shadow-lg mb-4" style="border: 1px solid #ddd;">
                            <img src="{{ asset('uploads/service/' . $service->image) }}" alt="{{ $service->title }}"
                                class="img-fluid w-100"
                                style="object-fit: cover; max-height: 460px; transition: transform 0.4s ease;">
                        </div>
                        <h2 class="pb-2 m-0 fw-bold">{{ $service->getTranslated('title') }}</h2>
                        <div class="text-secondary xs-text-des content-body js-dynamic-content" style="letter-spacing: 0.01em;">
                            {!! str_replace(
                                ['<o:p>', '</o:p>'],
                                '',
                                html_entity_decode(app()->getLocale() === 'ne' ? $service->getTranslated('description') : $service->getTranslated('description'))
                            ) !!}
                        </div>
                    </div>
                </div>

                <aside
                    class="col-lg-3 col-md-4 col-sm-12 p-4 bg-light rounded shadow-sm border asidebar">
                    <h4 class="mb-4 border-bottom pb-2 text-secondary">Special Offer</h4>
                    <ul class="list-unstyled m-0">
                        @foreach ($listservices as $Service)
                            <li class="mb-3 pb-3">
                                <a href="{{ route('SingleService', ['slug' => $Service->slug]) }}"
                                    class="fw-semibold content-heading text-decoration-none">
                                    <i class="fas fa-angle-right text-warning me-2"></i>
                                    {{$Service->getTranslated('title') }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </aside>

            </div>
        </div>
    </section>



    <script>
        // Optional: subtle zoom effect on main image hover
        document.querySelectorAll('.overflow-hidden img').forEach(img => {
            img.addEventListener('mouseenter', () => img.style.transform = 'scale(1.05)');
            img.addEventListener('mouseleave', () => img.style.transform = 'scale(1)');
        });
        // Auto split description into paragraphs: every ~100 words, break at sentence end.
        document.addEventListener('DOMContentLoaded', function () {
            const container = document.querySelector('.js-dynamic-content');
            if (!container) return;
            const text = (container.textContent || '').trim();
            const THRESHOLD = 100;
            if (!text) return;
            const sentenceRegex = /[^.!?।]+[.!?।]+|\S+/g;
            const sentences = [];
            let match;
            while ((match = sentenceRegex.exec(text)) !== null) {
                sentences.push(match[0].trim());
            }
            if (sentences.length === 0) return;
            const paragraphs = [];
            let buffer = [];
            let wordCount = 0;
            const countWords = (s) => (s.match(/\S+/g) || []).length;
            for (const s of sentences) {
                buffer.push(s);
                wordCount += countWords(s);
                const endsWithPunct = /[.!?।]$/.test(s);
                if (wordCount >= THRESHOLD && endsWithPunct) {
                    paragraphs.push(buffer.join(' ').replace(/\s+/g, ' ').trim());
                    buffer = [];
                    wordCount = 0;
                }
            }
            if (buffer.length) {
                paragraphs.push(buffer.join(' ').replace(/\s+/g, ' ').trim());
            }
            if (paragraphs.length > 1) {
                const escapeHtml = (str) => str
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;');
                container.innerHTML = '<p>' + paragraphs.map(escapeHtml).join('</p><p>') + '</p>';
            }
        });
    </script>










@endsection
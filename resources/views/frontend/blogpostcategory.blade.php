@extends('frontend.layouts.master')


<head>
    <title>{{ $singleblogmeta?->title ?? 'Default Title' }}</title>
    <meta name="description" content="{{ $singleblogmeta?->description ?? '' }}">

</head>


@section('content')

   <section class="position-relative text-white text-center mb-2"
        style="background: url('{{ asset('image/blog.webp') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <p class="fw-bold display-4">{{ $blogpostcategory->getTranslated('title') }}</p>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    {{ $blogpostcategory->getTranslated('title') }}
                </p>
            </div>
        </div>
    </section>

<section class="sample_page py-5 bg-white">
    <div class="container">
        <div class="row gx-5 gy-4">
            {{-- Main column (image + content) --}}
            <div class="col-lg-9 col-md-8 col-sm-12 order-1 order-md-1">
                <div class="scrollable-content">
                    <div class="overflow-hidden rounded shadow-lg mb-4" style="border: 1px solid #ddd;">
                        <img src="{{ asset('uploads/blogpostcategory/' . $blogpostcategory->image) }}" 
                             alt="{{ $blogpostcategory->title }}" 
                             class="img-fluid w-100" 
                             style="object-fit: cover; max-height: 460px; transition: transform 0.4s ease;">
                    </div>
                    <h2 class="fw-bold pb-2 m-0">{{ $blogpostcategory->getTranslated('title') }}</h2>
                    <div class="text-secondary xs-text-des content-body js-dynamic-content" style="letter-spacing: 0.01em;">
                        {!! str_replace(
                            ['<o:p>', '</o:p>'],
                            '',
                            html_entity_decode(app()->getLocale() === 'ne' ? $blogpostcategory->content_ne : $blogpostcategory->getTranslated('content'))
                        ) !!}
                    </div>
                </div>
            </div>

            {{-- Sidebar - Other Categories --}}
            <aside
                class="col-lg-3 col-md-4 col-sm-12 order-2 order-md-2 p-4 bg-light rounded shadow-sm border asidebar">
                <h4 class="mb-4 border-bottom pb-2 text-secondary">Special Offer</h4>
                <ul class="list-unstyled m-0">
                    @foreach ($listblogs as $blog)
                        <li class="mb-3 pb-3">
                            <a href="{{ route('blog', ['slug' => $blog->slug]) }}"
                               class="fw-semibold content-heading text-decoration-none">
                                <i class="fas fa-angle-right text-warning me-2"></i>
                                {{ app()->getLocale() === 'ne' ? $blog->getTranslated('title_ne') : $blog->getTranslated('title') }}
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

        // Split into sentence-like chunks, supporting common terminators including Devanagari danda (।)
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
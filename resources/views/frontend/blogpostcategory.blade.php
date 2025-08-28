@extends('frontend.layouts.master')

@section('content')

   <section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/q.avif') }}') center center / cover no-repeat; height:400px;">
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

<section class="sample_page py-5 bg-white">
    <div class="container">
        <div class="row gx-5 gy-2">

            {{-- Main Image --}}
            <div class="col-lg-8 col-md-8 col-sm-12 order-1 order-md-1">
                <div class="overflow-hidden rounded shadow-lg mb-3" style="border: 1px solid #ddd;">
                    <img src="{{ asset('uploads/blogpostcategory/' . $blogpostcategory->image) }}" 
                         alt="{{ $blogpostcategory->title }}" 
                         class="img-fluid w-100" 
                         style="object-fit: cover; max-height: 420px; transition: transform 0.4s ease;">
                </div>
            </div>
            {{-- Content --}}
            <div class="col-lg-8 col-md-8 col-sm-12 order-2 order-md-3 ">
                <h2 class=" fw-bold pb-2 m-0">{{ $blogpostcategory->title }}</h2>
                <div class="text-secondary xs-text-des" style=" letter-spacing: 0.01em;">
                    {{ strip_tags(app()->getLocale() === 'ne' ? $blogpostcategory->content_ne : $blogpostcategory->content) }}

                </div>
            </div>



            

            {{-- Sidebar - Other Categories --}}
            <aside class="col-lg-4 col-md-4 col-sm-12 order-3 order-md-2 sample_page_list p-4 bg-light rounded shadow-sm border">
                <h4 class="mb-4 border-bottom pb-2 text-secondary">Our Specials offer</h4>
                <ul class="list-unstyled">
                    @foreach ($listblogs as $blog)
                        <li class="mb-3">
                            <a href="{{ route('SingleBlogpostcategory', ['slug' => $blog->slug]) }}" 
                               class="text-decoration-none fw-semibold text-primary d-block py-1 px-2 rounded"
                               style="transition: background-color 0.3s, color 0.3s;"
                               onmouseover="this.style.backgroundColor='#0d6efd'; this.style.color='#fff'; this.style.textDecoration='none';" 
                               onmouseout="this.style.backgroundColor=''; this.style.color='';">
                                {{ app()->getLocale() === 'ne' ? $blog->title_ne : $blog->title }}
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
</script>
@endsection
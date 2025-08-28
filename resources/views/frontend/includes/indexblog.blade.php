

  <style>
    .blog-img {
      height: 250px;
      object-fit: cover;
    }
    @media (max-width: 768px) {
      .blog-img {
        height: 200px;
      }
    }
  </style>
<div class="container py-5"> 
    <div class="row mb-4">
      <div class="col-6 text-white">
        <h1 class="heading ">Our Blogs</h1>
        <p class="extralarger">Timeless Adventures Await with Timeless Stories.</p>
      </div>
    </div>
  <div class="row g-4">

    <!-- Card 1 -->
     @foreach ( $blogs as $blogs)
         <div class="col-md-4">
        <img src="{{ asset('uploads/blogpostcategory/' .$blogs->image) }}" class="card-img-top blog-img" alt="Traveller">
        <div class="card-body px-0 mt-1">
          <small class="text-uppercase fw-semibold content-topheading">Traveller Blog</small>
          <h5 class="card-title fw-semibold mt-2 text-dark content-heading text-capitalize">{{ $blogs->title }}</h5>
          <p class="card-text text-muted mt-2">{{ \Illuminate\Support\Str::limit(strip_tags($blogs->content), 150) }}</p>
          <a href="{{ route('SingleBlogpostcategory', $blogs->slug) }}" class="text-dark fw-semibold  text-decoration-none content-button">
            Read More <i class="bi bi-arrow-right text-dark"></i>
          </a>
        </div>
    </div>

@endforeach
  </div>
</div>


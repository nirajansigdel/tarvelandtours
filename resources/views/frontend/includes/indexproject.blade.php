

<style>
  .project-content {
  position: absolute;
  bottom:0px; /* half of the image height (~280px / 2) */
  left:0.5rem;
  right:0.5rem;
  background-color: #fff;
  padding: 1.5rem;
  box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
  z-index: 2;
}
.project-card {
  min-height:280px; /* adjust if needed */
  transform: translateY(8px);
  transition: transform 0.35s cubic-bezier(0.22, 0.61, 0.36, 1), box-shadow 0.35s ease;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
}

.project-card:hover {
  transform: translateY(0);
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
}

/* Mobile fallback: content should come below the image */
@media (max-width: 768px) {
  .project-content {
    position: relative;
    bottom: auto;
    margin-top: 1rem;
  }
}


</style>


<section class="container-fluid py-5 bg-gray">

  <div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
      <h1 class=" fw-bold text-dark">Our Featured Projects</h1>
      <p class="text-muted fs-6">
        Explore some of our most impactful software solutions developed for real-world business challenges.
      </p>
    </div>

    <!-- Project Cards -->
    <div class="row g-5">
      @foreach ($products->where('type', 'cyc')->take(2) as $course)
        <div class="col-md-4">
          <div class="position-relative card-hover-effect project-card">

            <!-- Project Image -->
            @if (is_array($course->images) && count($course->images))
              <img src="{{ asset('uploads/products/' . $course->images[0]) }}"
                   class="img-fluid w-100 rounded"
                   alt="Project Image"
                   style="height: 280px; object-fit: cover;">
            @endif

            <!-- Overlapping Content -->
            <div class="project-content">
              <h5 class="fw-bold  mb-2 text-capitalize">
                {{ Str::limit(strip_tags($course->heading), 90) }}
              </h5>
              <p class="xs-text-des">
                {{ Str::limit(strip_tags($course->content), 200) }}
              </p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

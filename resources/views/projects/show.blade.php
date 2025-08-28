
@extends('frontend.layouts.master')
<style>
    .xs-text-des {
        font-size: 1.15rem;
        color: #444;
        line-height: 1.6;
        font-weight: 400;
        font-family: var(--font-family-inter);
        margin-bottom: 1.5rem;
        letter-spacing: 0.02em;

    }
</style>

<style>
  .project-content {
  position: absolute;
  bottom:0px; /* half of the image height (~280px / 2) */
  left: 1rem;
  right: 1rem;
  background-color: #fff;
  padding: 1.5rem;
  box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
  z-index: 2;
}
.project-card {
  min-height: 420px; /* adjust if needed */
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


@section('content')

<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/destin.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">OUR OFFER</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    offer
                </p>
            </div>
        </div>
    </section>

<section class="py-5 bg-light">
  <div class="container">
    <!-- Title -->
    <div class="text-center mb-5">
      <h1 class="heading">Explore our offer</h1>
      <p class="extralarge">
        Check back later for updates on this project.
      </p>
    </div>

    @php
    use Illuminate\Pagination\LengthAwarePaginator;

    function paginateDemandType($demands, $type, $perPage = 6, $pageParamName = 'page') {
        $filtered = $demands->where('type', $type)->values();
        $currentPage = request()->get($pageParamName, 1);
        $currentPage = max(1, (int) $currentPage);

        $sliced = $filtered->slice(($currentPage - 1) * $perPage, $perPage);

        return new LengthAwarePaginator(
            $sliced,
            $filtered->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'pageName' => $pageParamName]
        );
    }

    $post = paginateDemandType($demands, 'cyc', 6, 'cyc_page');
    $festivaloffer = paginateDemandType($demands, 'community_empowerment', 6, 'ce_page');
    $Destinationcard = paginateDemandType($demands, 'nsep', 6, 'nsep_page');
    $generaloffer = paginateDemandType($demands, 'frp', 6, 'frp_page');
    $couplecard  = paginateDemandType($demands, 'bamboo_project', 6, 'bamboo_page');
    $groupcard = paginateDemandType($demands, 'child_care_home', 6, 'cch_page');
@endphp


    <!-- Project Cards -->
    <div class="row g-5">
      @foreach ($post as $demand)
        <div class="col-md-6 col-lg-6">
          <div class="position-relative card-hover-effect project-card">
            <!-- Image -->
            @if ($demand->image)
              <img src="{{ asset('uploads/demands/' . $demand->image) }}"
                   alt="Project Image"
                   class="img-fluid w-100 rounded mb-3"
                   style="height: 250px; object-fit: cover;">
            @endif
            <!-- Content -->
             <div class="project-content">
            <h5 class="fw-bold mb-2 text-capitalize">
              {{ Str::limit(strip_tags($demand->heading), 90) }}
            </h5>
            @if($demand->subtitle)
              <h6 class="text-muted mb-2">{{ $demand->subtitle }}</h6>
            @endif

            <p class="xs-text-des text-muted">
              {{ Str::limit(strip_tags($demand->content), 200) }}
            </p>
</div>
          </div>
        </div>
      @endforeach
    </div>


 generalofferblade


    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
      {{ $post->onEachSide(1)->links() }}
    </div>
  </div>
</section>
@endsection
<style>
  .coupbg {
    background-color: #00264d;
  }

  .custom-heading {
    font-size: 2rem;
    font-weight: 700;
    color: #ff8c1a;
  }

  .custom-subtext {
    color: #dcdcdc;
    font-size: 1rem;
    line-height: 1.6;
  }

  .custom-overlay-container {
    position: relative;
    overflow: hidden;
    border-radius: 10px;
  }

  .custom-overlay-container img {
    width: 100%;
    height: 500px;
    object-fit: cover;
    display: block;
    border-radius: 10px;
  }

  .custom-overlay {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 100%;
    background: linear-gradient(to top, rgba(0, 0, 0, 0.6) 30%, transparent 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    /* start from bottom */
    opacity: 0;
    padding: 20px;
    color: white;
    border-radius: 10px;
    transform: translateY(100%);
    transition: opacity 0.5s ease, transform 0.5s ease;
    pointer-events: none;
    /* prevents button from being clickable when hidden */
  }

  .custom-overlay-container:hover .custom-overlay {
    opacity: 1;
    transform: translateY(0);
    /* move from bottom to center */
    justify-content: center;
    /* center vertically on hover */
    pointer-events: auto;
    /* enable clicking */
  }

  .overlay-text {
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 12px;
    text-align: center;
  }

  .overlay-btn {
    background: transparent;
    border: 2px solid white;
    color: white;
    padding: 10px 20px;
    font-weight: 700;
    border-radius: 25px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .overlay-btn:hover {
    background-color: white;
    color: #00264d;
  }

  @media (max-width: 767px) {
    .custom-heading {
      font-size: 1.5rem;
    }

    .overlay-text {
      font-size: 1.3rem;
    }

    .custom-overlay-container img {
      height: 300px;
    }
  }
</style>
<section class="container-fluid coupbg py-4">
  <div class="container my-5">
    <div class="row align-items-center g-4 text-white">
      @foreach ($couplecard->take(1) as $couple)

        <!-- LEFT COLUMN: COUPLES -->
        <div class="col-md-6">
          <h2 class="custom-heading">Special Offer for Couples</h2>
          <h3 class="contenttitle text-white">
            {!! \Illuminate\Support\Str::limit(strip_tags($couple->heading, '<p><br>'), 200) !!}
          </h3>
          <p class="custom-subtext">
            {!! \Illuminate\Support\Str::limit(strip_tags($couple->content, '<p><br>'), 200) !!}
          </p>
          <div class="custom-overlay-container shadow">
            <img
              src="{{ (is_array($couple->images) && count($couple->images)) ? asset('uploads/products/' . $couple->images[0]) : asset('images/default-couple.jpg') }}"
              alt="Service Image">
            <div class="custom-overlay p-3  rounded shadow-sm">

              @if($couple->original_price || $couple->discounted_price)
                <div class="mt-3">

                  @if($couple->original_price && $couple->discounted_price)
                    <h6 class="mb-2 text-white fw-semibold">
                      Package Price:
                      <span class="text-decoration-line-through text-light fw-normal" style="font-size: 0.9rem;">
                        NPR {{ number_format($couple->original_price) }}
                      </span>
                    </h6>

                    <div class="d-flex flex-column">
                      <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                        Discounted Price: NPR {{ number_format($couple->discounted_price) }}
                      </span>
                      <span class="text-white small">
                        Couple's Offer Price:NPR {{ number_format($couple->original_price - $couple->discounted_price) }}
                      </span>
                    </div>

                  @elseif($couple->discounted_price)
                    <div class="d-flex flex-column">
                      <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                        Price: NPR {{ number_format($couple->discounted_price) }}
                      </span>
                    </div>

                  @elseif($couple->original_price)
                    <div class="d-flex flex-column">
                      <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                        Price: NPR {{ number_format($couple->original_price) }}
                      </span>
                    </div>
                  @endif

                </div>
              @endif


              <div class="mt-4">
                 <a class="overlay-btn text-decoration-none" href="{{ route('products.detail', $couple->id) }}">View More</a>
              </div>
            </div>

          </div>
        </div>
      @endforeach
      <!-- RIGHT COLUMN: ADVENTURE -->
      @foreach ($groupcard->take(1) as $group)
        <div class="col-md-6">
            <div class="custom-overlay-container shadow">
              <img
                src="{{ (is_array($group->images) && count($group->images)) ? asset('uploads/products/' . $group->images[0]) : asset('images/default-couple.jpg') }}"
                alt="Service Image">
              <div class="custom-overlay p-3  rounded shadow-sm">

                @if($group->original_price || $group->discounted_price)
                  <div class="mt-3">

                    @if($group->original_price && $group->discounted_price)
                      <h6 class="mb-2 text-white fw-semibold">
                        Package Price:
                        <span class="text-decoration-line-through text-light fw-normal" style="font-size: 0.9rem;">
                          NPR {{ number_format($group->original_price) }}
                        </span>
                      </h6>

                      <div class="d-flex flex-column">
                        <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                          Discounted Price: NPR {{ number_format($group->discounted_price) }}
                        </span>
                        <span class="text-white small">
                          Couple's Offer Price:NPR {{ number_format($group->original_price - $couple->discounted_price) }}
                        </span>
                      </div>

                    @elseif($group->discounted_price)
                      <div class="d-flex flex-column">
                        <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                          Price: NPR {{ number_format($group->discounted_price) }}
                        </span>
                      </div>

                    @elseif($group->original_price)
                      <div class="d-flex flex-column">
                        <span class="fw-bold text-white mb-1" style="font-size: 1.1rem;">
                          Price: NPR {{ number_format($group->original_price) }}
                        </span>
                      </div>
                    @endif

                  </div>
                @endif
                <div class="mt-4">
                  <a class="overlay-btn text-decoration-none" href="{{ route('products.detail', $group->id) }}">View More</a>
                </div>
              </div>

            </div>
         

          <h2 class="custom-heading mt-4">Special Group Package</h2>
          <h3 class="contenttitle text-white">
            {!! \Illuminate\Support\Str::limit(strip_tags($group->heading, '<p><br>'), 200) !!}
          </h3>
          <p class="custom-subtext">
            {!! \Illuminate\Support\Str::limit(strip_tags($group->content, '<p><br>'), 200) !!}
          </p>
        </div>
      @endforeach

    </div>
  </div>
</section>
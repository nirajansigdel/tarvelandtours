@extends('frontend.layouts.master')
@section('content')

<section class="position-relative text-white text-center"
        style="background: url('{{ asset('image/events.jpg') }}') center center / cover no-repeat; height:400px;">
        <div class="herosectionoverlay"></div>

        <div class="container h-100 d-flex flex-column justify-content-center align-items-center position-relative">
            <div class="mt-5 pt-5">
                <h1 class="fw-bold display-4">Explore Image</h1>
                <p class="mt-2 fs-5">
                    <span class="fw-semibold">Home</span>
                    <i class="fas fa-angle-double-right mx-2 text-warning"></i>
                    image
                </p>
            </div>
        </div>
    </section>

    <style>
        .gallery_image{
            height:400px;
            width: 400px;
        }
    </style>
<div class="container py-3">
    <div class="row ">
        <div class="col-lg-5">
            <h2 class="extralarger greenhighlight" >{{ $image->title }}</h2>
            <p class="content-desc">A view of all images</p>
        </div>
    </div>
</div>

<section class="single_page">
     <p class="content-desc text-center fw-bold text-capitalize"> <span>
                    {{ $image->img_desc }}
            </span></p>
    <div class="container">
        <div class="row mt-3">
            @foreach (array_reverse($image->img) as $imgUrl)
            <div class="col-md-4 mb-3">
                <a class="image-link" href="{{ asset($imgUrl) }}" style="color: var(--first)">
                    <img src="{{ asset($imgUrl) }}" class="gallery_image">
                </a>
            </div>
        @endforeach
       
        </div>
    </div>
</section>
<!-- Include Magnific Popup CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
<!-- Include jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Include Magnific Popup JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function(){
        $('.image-link').magnificPopup({
            type: 'image',
            gallery:{
                enabled:true
            }
        });
    });
</script>
@endsection

@section('content')


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

@extends('frontend.layouts.master')
@include("frontend.includes.herosection")
@include("frontend.includes.banner")
@include("frontend.includes.offer")
@include("frontend.includes.couple")
@include("frontend.includes.Destination")
@include("frontend.includes.why")  
@include("frontend.includes.costest")
@include("frontend.includes.indexservice")
@include("frontend.includes.indextestimonials")
@include("frontend.includes.contact") 
@include("frontend.includes.whatwedo")
@include("frontend.includes.indexblog")

{{-- 


 @include("frontend.includes.indexgallary") 




--}}

{{-- Vacancy Modal --}}

   


{{-- Dynamic Notification Modal --}}
@if($notifications->count() > 0)
    @foreach($notifications as $notification)
        <div class="modal fade" id="notificationModal{{ $notification->id }}" tabindex="-1" aria-labelledby="notificationModalLabel{{ $notification->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered"> <!-- Use modal-xl for wide width -->
        <div class="modal-content w-100 border-0 rounded-4 overflow-hidden shadow-lg">
            <div class="modal-header bg-primary text-white px-4 py-3">
                <div class="d-flex align-items-center w-100 justify-content-between">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-bell me-2 fs-5"></i>
                        <h5 class="modal-title mb-0" id="notificationModalLabel{{ $notification->id }}">{{ $notification->title }}</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body px-4 py-4">
                @if($notification->image)
                    <div class="notification-image mb-3">
                        <img src="{{ asset('uploads/notifications/' . $notification->image) }}" 
                             alt="{{ $notification->title }}" 
                             class="img-fluid rounded shadow-sm"
                             style="width: 100%; min-height: 500px; object-fit: cover;">
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

    @endforeach
@endif


<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if($notifications->count() > 0)
            // Show the first notification modal
            var firstNotificationModal = new bootstrap.Modal(document.getElementById('notificationModal{{ $notifications->first()->id }}'), {
                keyboard: false
            });
            
            @if($latestVacancies->count())
                var vacancyModal = new bootstrap.Modal(document.getElementById('vacancyModal'), {
                    keyboard: false
                });

                vacancyModal.show();

                document.getElementById('vacancyModal').addEventListener('hidden.bs.modal', function () {
                    setTimeout(function() {
                        firstNotificationModal.show();
                    }, 100);
                });
            @else
                firstNotificationModal.show();
            @endif
        @endif

        if (!localStorage.getItem('modalsShown')) {
            localStorage.setItem('modalsShown', 'true');
        }
    });
    </script>


<script>
    $(document).ready(function() {
        $('#contactForm').on('submit', function(event) {
            event.preventDefault(); 
            var form = $(this);
            var formData = new FormData(this);
            var recaptchaResponse = grecaptcha.getResponse();


            if (recaptchaResponse.length === 0) {
                alert("Please tick the reCAPTCHA box before submitting.");
                return;
            }
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert("Message sent successfully!");
                    } else {
                        alert("Error in sending message. Please try again.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("An unexpected error occurred. Please try again.");
                }
            });
        });
    });
</script>
<style>
    .notification-image img {
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        transition: transform 0.3s ease;
        object-fit: cover;
        max-height: 320px;
        width:500px;
    }

    .notification-image img:hover {
        transform: scale(1.01);
    }

    .modal-content {
        border-radius: 12px;
        box-shadow: 0 12px 40px rgba(0,0,0,0.25);
        border: none;
        overflow: hidden;
    }

    .modal-header {
        background:var(--primary) !important;
        color: #fff;
        padding: 1rem 1.5rem;
        border-bottom: none;
    }

    .modal-header .modal-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .modal-body {
        padding: 2rem;
    }

    .modal-footer {
        padding: 1rem 1.5rem;
        border-top: none;
    }

    .btn-close-white {
        filter: brightness(0) invert(1);
    }

    .notification-content h6 {
        font-size: 0.875rem;
        color: #6c757d;
        font-weight: 500;
    }

    .notification-content p {
        font-size: 1rem;
        color: #333;
        margin-bottom: 0;
    }

    @media (max-width: 576px) {
        .modal-body {
            padding: 1.25rem;
        }

        .notification-image img {
            max-height: 240px;
        }

        .modal-header, .modal-footer {
            padding: 1rem;
        }

        .modal-title {
            font-size: 1rem;
        }
    }
</style>



@endsection
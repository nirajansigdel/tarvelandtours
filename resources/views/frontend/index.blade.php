@extends('frontend.layouts.master')

<head>

    <title>{{ $seoSetting->meta_title ?? config('app.name') }}</title>
    <meta name="description" content="{{ $seoSetting->meta_description ?? '' }}">  
</head>

@section('content')

@php
    use Illuminate\Pagination\LengthAwarePaginator;

    function paginateProductType($products, $type, $perPage = 6, $pageParamName = 'page') {
        $filtered = $products->filter(function($product) use ($type) {
            $productTypes = $product->product_types;
            
            // Handle case where product_types is a JSON string
            if (is_string($productTypes)) {
                $productTypes = json_decode($productTypes, true) ?? [];
            }
            
            // Ensure it's an array
            if (!is_array($productTypes)) {
                $productTypes = [];
            }
            
            return in_array($type, $productTypes);
        })->values();
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

    $post = paginateProductType($products, 'Post', 6, 'cyc_page');
    $festivaloffer = paginateProductType($products, 'Festival', 6, 'ce_page');
    $Destinationcard = paginateProductType($products, 'Destination', 6, 'nsep_page');
    $generaloffer = paginateProductType($products, 'General', 6, 'frp_page');
    $couplecard  = paginateProductType($products, 'Couple', 6, 'bamboo_page');
    $groupcard = paginateProductType($products, 'Group', 6, 'cch_page');
@endphp
{{--





--}}
@include("frontend.includes.herosection")
@include("frontend.includes.banner")
@include("frontend.includes.indexoffer")
@include("frontend.includes.indexcouple")
@include("frontend.includes.indexDestination")
@include("frontend.includes.why") 
@include("frontend.includes.indexabout")
@include("frontend.includes.indexservice")
@include("frontend.includes.indextestimonials")
@include("frontend.includes.contact") 
@include("frontend.includes.whatwedo")
@include("frontend.includes.indexblog")


{{-- 





 









--}}

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
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        alert("{{ __('message_sent_successfully') }}");
                    } else {
                        alert("{{ __('error_sending_message') }}");
                    }
                },
                error: function(xhr, status, error) {
                    alert("{{ __('unexpected_error') }}");
                }
            });
        });
    });
</script>



@endsection
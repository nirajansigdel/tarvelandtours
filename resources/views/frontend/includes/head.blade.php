<head>
    @php
        use App\Models\Favicon;
        $favicon = Favicon::first();
    @endphp

    <meta charset="UTF-8">
    <meta name="viewport" content="{{ $seoSetting->viewport ?? 'width=device-width, initial-scale=1.0' }}">
    <title>@yield('title', $seoSetting->meta_title ?? config('app.name'))</title>
    <meta name="keywords" content="{{ $seoSetting->meta_keywords ?? '' }}">
    <meta name="author" content="{{ $seoSetting->meta_author ?? '' }}">

    {{-- Canonical --}}
    @if(!empty($seoSetting->canonical_url))
        <link rel="canonical" href="{{ $seoSetting->canonical_url }}">
    @else
        <link rel="canonical" href="{{ url()->current() }}">
    @endif

    {{-- Schema --}}
    @if(!empty($seoSetting->schema))
    <script type="application/ld+json">
    {!! $seoSetting->schema !!}
    </script>
    @endif

    {{-- Google verification --}}
    <meta name="google-site-verification" content="googlecb47e017379254a9" />
    <meta name="google-site-verification" content="hA2X9K8hwBlf_rNWosKrQJr_hYCyRN3mcCFyjKGZ3J0" />

    {{-- Stylesheets --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ file_exists(public_path('css/style.css')) ? filemtime(public_path('css/style.css')) : time() }}">

    {{-- Favicon --}}
    @if($favicon)
        @if($favicon->favicon_ico)
            <link rel="icon" type="image/png" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
            <link rel="shortcut icon" type="image/x-icon" href="{{ asset('uploads/favicon/' . $favicon->favicon_ico) }}">
        @endif
        @if($favicon->apple_touch_icon)
            <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('uploads/favicon/' . $favicon->apple_touch_icon) }}">
        @endif
        @if($favicon->favicon_thirtyTwo)
            <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('uploads/favicon/' . $favicon->favicon_thirtyTwo) }}">
        @endif
        @if($favicon->favicon_sixteen)
            <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('uploads/favicon/' . $favicon->favicon_sixteen) }}">
        @endif
    @else
        <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">
    @endif

    {{-- Scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>

</head>

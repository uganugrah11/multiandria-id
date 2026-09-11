@props(['title' => null, 'description' => null, 'image' => null, 'type' => null])
@php
    $pageTitle = $title ?: config('seo.default_title');
    $pageDescription = $description ?: config('seo.default_description');
    $pageImage = $image ?: config('seo.default_image');
    $canonical = url()->current();
    $imageUrl = str_starts_with($pageImage, 'http') ? $pageImage : asset($pageImage);
@endphp
<title>{{ $pageTitle }}</title>
<meta name="description" content="{{ $pageDescription }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index,follow">
<meta property="og:locale" content="{{ config('seo.locale') }}">
<meta property="og:type" content="{{ $type ?: config('seo.type') }}">
<meta property="og:site_name" content="{{ config('seo.site_name') }}">
<meta property="og:title" content="{{ $pageTitle }}">
<meta property="og:description" content="{{ $pageDescription }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $imageUrl }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $pageTitle }}">
<meta name="twitter:description" content="{{ $pageDescription }}">
<meta name="twitter:image" content="{{ $imageUrl }}">
<link rel="icon" href="{{ asset('images/logo-mai-transparent.png') }}">

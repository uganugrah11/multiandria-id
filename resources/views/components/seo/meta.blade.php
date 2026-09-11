@props([
    'title' => null,
    'description' => null,
    'image' => null,
    'canonical' => null,
    'robots' => 'index, follow',
])

@php
    $seoConfig = config('seo');
    $siteName = $seoConfig['site_name'];
    $siteUrl = $seoConfig['site_url'];
    $locale = $seoConfig['locale'];
    $type = $seoConfig['type'];
    
    // Use provided values or fall back to defaults
    $finalTitle = $title ?? $seoConfig['default_title'];
    $finalDescription = $description ?? $seoConfig['default_description'];
    $finalImage = $image ?? asset($seoConfig['default_image']);
    $finalCanonical = $canonical ?? request()->url();
    $finalRobots = $robots ?? 'index, follow';
@endphp

<!-- Title -->
<title>{{ $finalTitle }}</title>

<!-- Meta Description -->
<meta name="description" content="{{ $finalDescription }}">
<meta name="robots" content="{{ $finalRobots }}">

<!-- Canonical URL -->
<link rel="canonical" href="{{ $finalCanonical }}">

<!-- Open Graph -->
<meta property="og:type" content="{{ $type }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $finalTitle }}">
<meta property="og:description" content="{{ $finalDescription }}">
<meta property="og:image" content="{{ $finalImage }}">
<meta property="og:image:type" content="image/png">
<meta property="og:url" content="{{ $finalCanonical }}">
<meta property="og:locale" content="{{ $locale }}">

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $finalTitle }}">
<meta name="twitter:description" content="{{ $finalDescription }}">
<meta name="twitter:image" content="{{ $finalImage }}">
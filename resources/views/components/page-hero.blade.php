@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'variant' => 'dark',
    'alignment' => 'center',
    'class' => '',
])

@php
    $bgClass = match($variant) {
        'dark' => 'bg-mai-charcoal',
        'red' => 'bg-mai-red',
        'wine' => 'bg-mai-wine',
        'ivory' => 'bg-mai-ivory',
        'white' => 'bg-white',
        default => 'bg-mai-charcoal',
    };

    $textClass = match($variant) {
        'dark', 'wine', 'red' => 'text-white',
        'ivory', 'white' => 'text-mai-charcoal',
        default => 'text-white',
    };

    $subtextClass = match($variant) {
        'dark', 'wine', 'red' => 'text-white/70',
        'ivory', 'white' => 'text-mai-slate',
        default => 'text-white/70',
    };

    $eyebrowClass = match($variant) {
        'dark', 'wine', 'red' => 'text-mai-soft-red',
        'ivory', 'white' => 'text-mai-red',
        default => 'text-mai-soft-red',
    };

    $alignClass = $alignment === 'center' ? 'text-center mx-auto' : 'text-left';
    $maxClass = $alignment === 'center' ? 'max-w-4xl' : 'max-w-4xl';
@endphp

<section data-page-hero class="{{ $bgClass }} pb-16 pt-28 sm:pb-24 sm:pt-32">
    <div class="mx-auto {{ $maxClass }} px-4 sm:px-6 lg:px-8 {{ $alignClass }}">
        @if($eyebrow)
            <p data-hero-eyebrow class="{{ $eyebrowClass }} text-xs font-bold uppercase tracking-widest">{{ $eyebrow }}</p>
        @endif
        <h1 data-hero-headline class="mt-4 text-3xl font-extrabold leading-[1.1] {{ $textClass }} sm:text-4xl lg:text-5xl">{{ $title }}</h1>
        @if($description)
            <p data-hero-description class="mx-auto mt-4 max-w-xl text-base leading-relaxed {{ $subtextClass }}">{{ $description }}</p>
        @endif
        @if(isset($actions) && $actions->isNotEmpty())
            <div data-hero-actions class="mt-8 flex flex-wrap gap-4 {{ $alignment === 'center' ? 'justify-center' : '' }}">
                {{ $actions }}
            </div>
        @endif
    </div>
</section>

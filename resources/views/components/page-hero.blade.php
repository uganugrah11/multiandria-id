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

<section class="{{ $bgClass }} py-16 sm:py-24">
    <div class="mx-auto {{ $maxClass }} px-4 sm:px-6 lg:px-8 {{ $alignClass }}">
        @if($eyebrow)
            <p class="animate-fade-up {{ $eyebrowClass }} text-xs font-bold uppercase tracking-widest">{{ $eyebrow }}</p>
        @endif
        <h1 class="animate-fade-up mt-4 text-3xl font-extrabold leading-[1.1] {{ $textClass }} sm:text-4xl lg:text-5xl" style="--reveal-delay: 80ms">{{ $title }}</h1>
        @if($description)
            <p class="animate-fade-up mx-auto mt-4 max-w-xl text-base leading-relaxed {{ $subtextClass }}" style="--reveal-delay: 160ms">{{ $description }}</p>
        @endif
        @if(isset($actions) && $actions->isNotEmpty())
            <div class="animate-fade-up mt-8 flex flex-wrap gap-4 {{ $alignment === 'center' ? 'justify-center' : '' }}" style="--reveal-delay: 240ms">
                {{ $actions }}
            </div>
        @endif
    </div>
</section>

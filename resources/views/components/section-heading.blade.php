@props([
    'eyebrow' => null,
    'align' => 'left', // left | center
])

<div {{ $attributes->class(['max-w-2xl', 'mx-auto text-center' => $align === 'center']) }}>
    @if($eyebrow)
        <p class="text-xs font-bold uppercase tracking-widest text-mai-red">{{ $eyebrow }}</p>
    @endif
    <h2 class="mt-3 text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl">
        {{ $slot }}
    </h2>
</div>

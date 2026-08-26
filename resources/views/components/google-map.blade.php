@props([
    'query',
    'label' => 'Lokasi',
    'zoom' => 15,
    'aspect' => 'aspect-4/3', // aspect-4/3 | aspect-video | aspect-square
])

@php
    $src = 'https://www.google.com/maps?q='.rawurlencode($query).'&z='.$zoom.'&output=embed';
@endphp

<div {{ $attributes->class(['relative overflow-hidden rounded-xl border border-mai-border bg-mai-gray', $aspect]) }}>
    <iframe
        src="{{ $src }}"
        title="Peta lokasi — {{ $label }}"
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        class="absolute inset-0 h-full w-full grayscale-[15%] transition-[filter] duration-300 hover:grayscale-0"
        style="border: 0"
    ></iframe>
</div>

@props([
    'location',
    'variant' => 'prominent', // prominent | compact
])

@php
    $markerIcon = <<<'SVG'
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5" aria-hidden="true">
            <path fill-rule="evenodd" d="M11.54 22.35a.75.75 0 0 0 .92 0c.14-.11 3.45-2.72 6.28-6.19C20.68 13.63 22 11.03 22 8.5 22 4.36 18.64 1 14.5 1S7 4.36 7 8.5c0 2.53 1.32 5.13 3.26 7.66 2.83 3.47 6.14 6.08 6.28 6.19ZM11.5 8.5A2.5 2.5 0 1 1 14 11a2.5 2.5 0 0 1-2.5-2.5Z" clip-rule="evenodd" transform="translate(-2.5)"/>
        </svg>
    SVG;
@endphp

@if($variant === 'compact')
    <div {{ $attributes->class(['rounded-2xl border border-mai-border bg-white p-6']) }}>
        <div class="flex items-start gap-3">
            <span class="mt-0.5 flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-mai-red/10 text-mai-red">
                {!! $markerIcon !!}
            </span>
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-mai-red">{{ $location['type'] }}</p>
                <h3 class="mt-0.5 text-base font-bold text-mai-charcoal">{{ $location['name'] }}</h3>
            </div>
        </div>
        <p class="mt-3 text-sm leading-relaxed text-mai-slate">{{ $location['address'] }}</p>
        @if(trim($slot))
            <p class="mt-1 text-xs text-mai-slate">{{ $slot }}</p>
        @endif

        <div class="mt-4 overflow-hidden rounded-lg">
            <x-google-map :query="$location['map_query']" :label="$location['name']" aspect="aspect-video" :zoom="14" />
        </div>

        <a
            href="{{ $location['maps_url'] }}"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-4 inline-flex items-center gap-1 text-xs font-semibold text-mai-red transition-transform duration-200 hover:gap-1.5 hover:text-mai-wine"
        >
            Lihat di Google Maps &rarr;
        </a>
    </div>
@else
    <div {{ $attributes->class(['grid grid-cols-1 items-center gap-8 rounded-2xl border border-mai-border bg-white p-6 sm:p-8 lg:grid-cols-2 lg:gap-10']) }}>
        <div>
            <span class="flex h-11 w-11 items-center justify-center rounded-full bg-mai-red/10 text-mai-red">
                {!! $markerIcon !!}
            </span>
            <p class="mt-4 text-xs font-bold uppercase tracking-widest text-mai-red">{{ $location['type'] }}</p>
            <h3 class="mt-1 text-xl font-bold text-mai-charcoal">{{ $location['name'] }}</h3>
            <p class="mt-3 max-w-sm text-sm leading-relaxed text-mai-slate">{{ $location['address'] }}</p>

            <a
                href="{{ $location['maps_url'] }}"
                target="_blank"
                rel="noopener noreferrer"
                class="mt-6 inline-flex items-center justify-center gap-2 rounded-lg bg-mai-red px-6 py-3 text-sm font-semibold text-white shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-mai-wine hover:shadow-md motion-reduce:hover:translate-y-0"
            >
                Lihat di Google Maps
            </a>
        </div>

        <x-google-map :query="$location['map_query']" :label="$location['name']" aspect="aspect-4/3" />
    </div>
@endif

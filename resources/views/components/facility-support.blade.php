@props([
    'eyebrow' => 'DIDUKUNG FASILITAS KAMI',
    'heading' => 'Infrastruktur yang Mendukung Produksi Berkualitas',
    'paragraph' => null,   // supporting verified copy
    'ctaLabel' => 'Lihat Lokasi Kami',
    'ctaUrl' => null,
    'class' => '',
])

@php
    $ctaUrl = $ctaUrl ?? '#lokasi';
@endphp

<section class="bg-mai-ivory py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
            {{-- LEFT: editorial narrative --}}
            <div>
                <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">{{ $eyebrow }}</p>
                <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl lg:text-5xl" style="--reveal-delay: 60ms">
                    {{ $heading }}
                </h2>
                @if($paragraph)
                    <p class="reveal mt-6 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 100ms">
                        {{ $paragraph }}
                    </p>
                @endif
                <div class="reveal mt-8" style="--reveal-delay: 160ms">
                    <a href="{{ $ctaUrl }}" class="group inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-base font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                        {{ $ctaLabel }}
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            {{-- RIGHT: editorial image collage. factory.jpg (factory proof) is the
                 dominant image; hq.jpg + hq-1.jpg (HQ identity) support it below.
                 aspect ratios from actual files (4:3 and 3:2). --}}
            <div class="reveal" style="--reveal-delay: 100ms">
                <div class="relative">
                    {{-- Dominant factory image --}}
                    <figure class="overflow-hidden rounded-lg">
                        <img
                            src="{{ asset('images/factory/factory.jpg') }}"
                            alt="Fasilitas produksi Multi Andria Indonesia"
                            class="aspect-[4/3] w-full object-cover transition-transform duration-700 ease-out hover:scale-105"
                            loading="lazy"
                            width="2560"
                            height="1920"
                            decoding="async"
                        >
                    </figure>

                    {{-- Two supporting HQ images overlapping slightly --}}
                    <div class="mt-4 grid grid-cols-2 gap-4">
                        <figure class="overflow-hidden rounded-lg bg-mai-gray">
                            <img
                                src="{{ asset('images/factory/hq.jpg') }}"
                                alt="Kantor pusat Multi Andria Indonesia di Bintaro"
                                class="aspect-[3/2] w-full object-cover transition-transform duration-700 ease-out hover:scale-105"
                                loading="lazy"
                                width="2560"
                                height="1707"
                                decoding="async"
                            >
                        </figure>
                        <figure class="overflow-hidden rounded-lg bg-mai-gray">
                            <img
                                src="{{ asset('images/factory/hq-1.jpg') }}"
                                alt="Kantor pusat Multi Andria Indonesia di Bintaro"
                                class="aspect-[3/2] w-full object-cover transition-transform duration-700 ease-out hover:scale-105"
                                loading="lazy"
                                width="2560"
                                height="1707"
                                decoding="async"
                            >
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

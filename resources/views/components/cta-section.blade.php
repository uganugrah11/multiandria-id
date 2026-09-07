@props([
    'heading' => 'Siap Memulai Produksi?',
    'description' => 'Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia.',
    'variant' => 'solid', // solid | wine | dark | image | minimal
    'image' => null,      // image path for the image variant (must be semantically appropriate)
    'eyebrow' => null,    // optional eyebrow label, mainly for minimal/wine
    'whatsappMessage' => null,
    'secondaryLabel' => null,
    'secondaryUrl' => null,
    'class' => '',
])

@php
    $img = asset($image ?? '');
@endphp

@if($variant === 'minimal')
    {{-- Minimal editorial CTA: light background, leading CTA integrated into narrative. --}}
    <section class="bg-mai-ivory py-20 sm:py-28">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            @if($eyebrow !== '')
                <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">{{ $eyebrow ?? 'Mulai Konsultasi' }}</p>
            @endif
            <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl lg:text-5xl" style="--reveal-delay: 60ms">
                {{ $heading }}
            </h2>
            @if($description)
                <p class="reveal mx-auto mt-5 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 120ms">{{ $description }}</p>
            @endif
            <div class="reveal mt-9 flex flex-wrap justify-center gap-4" style="--reveal-delay: 180ms">
                <x-whatsapp-button size="lg" :message="$whatsappMessage">
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-base font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>

@elseif($variant === 'image' && $image)
    {{-- Image CTA: full-width imagery with scrim; only used with semantically
         appropriate authentic photography (e.g. final CTA). --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <img
            src="{{ $img }}"
            alt=""
            role="presentation"
            class="absolute inset-0 h-full w-full object-cover"
            loading="lazy"
            width="2560"
            height="1440"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-mai-charcoal/95 via-mai-charcoal/80 to-mai-charcoal/55"></div>
        <div class="relative mx-auto max-w-5xl px-4 py-24 text-center sm:px-6 sm:py-32 lg:px-8">
            <h2 class="reveal text-3xl font-extrabold leading-tight text-white sm:text-4xl lg:text-5xl">{{ $heading }}</h2>
            @if($description)
                <p class="reveal mx-auto mt-5 max-w-xl text-base leading-relaxed text-white/80" style="--reveal-delay: 60ms">{{ $description }}</p>
            @endif
            <div class="reveal mt-9 flex flex-wrap justify-center gap-4" style="--reveal-delay: 120ms">
                <x-whatsapp-button size="lg" :message="$whatsappMessage">
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>

@elseif($variant === 'wine')
    {{-- Wine closing CTA: full-width, editorial conclusion to the page.
         Uses a subdued wine-to-wine gradient (within brand family) so it reads
         as a deliberate visual close rather than a generic red rectangle. --}}
    <section class="relative overflow-hidden bg-mai-wine">
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-mai-soft-red/40 to-transparent" aria-hidden="true"></div>
        <div class="relative mx-auto max-w-3xl px-4 py-24 text-center sm:px-6 sm:py-32 lg:px-8">
            @if($eyebrow !== '')
                <p class="reveal text-xs font-bold uppercase tracking-widest text-white/60">{{ $eyebrow ?? 'Siap Mulai' }}</p>
            @endif
            <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-white sm:text-4xl lg:text-5xl" style="--reveal-delay: 60ms">
                {{ $heading }}
            </h2>
            @if($description)
                <p class="reveal mx-auto mt-5 max-w-xl text-base leading-relaxed text-white/80" style="--reveal-delay: 120ms">{{ $description }}</p>
            @endif
            <div class="reveal mt-9 flex flex-wrap justify-center gap-4" style="--reveal-delay: 180ms">
                <x-whatsapp-button
                    size="lg"
                    class="bg-white! text-mai-red! hover:bg-mai-ivory!"
                    :message="$whatsappMessage"
                >
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>

@elseif($variant === 'dark')
    <section class="bg-mai-charcoal py-20 sm:py-28">
        <div class="reveal mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            @if($eyebrow !== '')
                <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">{{ $eyebrow ?? 'Mulai Konsultasi' }}</p>
            @endif
            <h2 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">{{ $heading }}</h2>
            @if($description)
                <p class="mx-auto mt-4 max-w-xl text-base text-white/70">{{ $description }}</p>
            @endif
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <x-whatsapp-button size="lg" :message="$whatsappMessage">
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>

@else
    {{-- Solid (default): brand-red conversion band, existing behavior preserved. --}}
    <section class="bg-mai-red py-20 sm:py-28">
        <div class="reveal mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $heading }}</h2>
            @if($description)
                <p class="mx-auto mt-4 max-w-xl text-base text-white/80">{{ $description }}</p>
            @endif
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <x-whatsapp-button
                    size="lg"
                    class="bg-white! text-mai-red! hover:bg-mai-ivory!"
                    :message="$whatsappMessage"
                >
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
                @if($secondaryLabel && $secondaryUrl)
                    <a href="{{ $secondaryUrl }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        {{ $secondaryLabel }}
                    </a>
                @endif
            </div>
        </div>
    </section>
@endif

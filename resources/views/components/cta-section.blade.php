@props([
    'heading' => 'Siap Memulai Produksi?',
    'description' => 'Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia.',
    'variant' => 'red',
    'whatsappMessage' => null,
    'secondaryLabel' => null,
    'secondaryUrl' => null,
    'class' => '',
])

@php
    $bgClass = match($variant) {
        'red' => 'bg-mai-red',
        'dark' => 'bg-mai-charcoal',
        'wine' => 'bg-mai-wine',
        default => 'bg-mai-red',
    };
@endphp

<section class="{{ $bgClass }} py-20 sm:py-28">
    <div class="reveal mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold text-white sm:text-4xl">{{ $heading }}</h2>
        @if($description)
            <p class="mx-auto mt-4 max-w-xl text-base text-white/80">{{ $description }}</p>
        @endif
        <div class="mt-8 flex flex-wrap justify-center gap-4">
            <x-whatsapp-button
                size="lg"
                class="{{ $variant === 'red' ? 'bg-white! text-mai-red! hover:bg-mai-ivory!' : '' }}"
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

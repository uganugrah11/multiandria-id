@props(['item' => [], 'index' => 0, 'showInquiry' => false])

@php
    $projectName = $item['title'] ?? 'proyek ini';
    $inquiryMessage = 'Halo Multi Andria Indonesia, saya tertarik dengan produksi seperti "'.$projectName.'". Saya ingin berkonsultasi mengenai kebutuhan produksi saya.';
@endphp

<article data-motion-card="portfolio" class="reveal group flex h-full flex-col" style="--reveal-delay: {{ min($index * 60, 420) }}ms">
    {{-- Image with hover description overlay (desktop only) --}}
    <div class="relative aspect-[3/4] overflow-hidden bg-mai-gray">
        @if($item['image_url'])
            <img
                src="{{ $item['image_url'] }}"
                alt="{{ $item['title'] }}"
                width="1024"
                height="1365"
                class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 motion-reduce:group-hover:scale-100"
                loading="lazy"
                decoding="async"
            >
        @else
            <div class="flex h-full w-full items-center justify-center">
                <p class="px-6 text-center text-sm text-mai-slate">CONTENT NEEDED: authentic {{ $item['title'] }}</p>
            </div>
        @endif

        {{-- Hover overlay: description on desktop --}}
        <div class="absolute inset-0 flex items-end bg-gradient-to-t from-black/70 via-black/20 to-transparent p-5 opacity-0 transition-opacity duration-300 motion-reduce:opacity-100 lg:group-hover:opacity-100">
            <p class="text-[13px] leading-relaxed text-white/90 line-clamp-3">{{ $item['description'] }}</p>
        </div>
    </div>

    {{-- Card info --}}
    <div class="mt-4 flex flex-1 flex-col">
        <div class="min-h-[4.25rem]">
            <h3 class="text-base font-bold leading-snug text-mai-charcoal">{{ $item['title'] }}</h3>

            @if(! empty($item['brand_org']) && $item['brand_org'] !== '-')
                <p class="mt-1 text-xs font-semibold uppercase tracking-wide text-mai-slate">{{ $item['brand_org'] }}</p>
            @endif
        </div>

        {{-- Description below card: visible on mobile/tablet, hidden on desktop --}}
        <p class="mt-2 text-sm leading-relaxed text-mai-slate line-clamp-2 lg:hidden">{{ $item['description'] }}</p>

        @if($showInquiry)
            <x-whatsapp-button size="md" :message="$inquiryMessage" class="mt-5 w-full">
                Buat Produk Serupa
            </x-whatsapp-button>
        @endif
    </div>
</article>

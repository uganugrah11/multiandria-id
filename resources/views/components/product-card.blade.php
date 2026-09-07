@props(['item' => [], 'index' => 0])

<article class="reveal group flex h-full flex-col rounded-lg border border-mai-border bg-mai-white p-6 shadow-card transition-shadow duration-200 hover:shadow-card-hover lg:p-8" style="--reveal-delay: {{ min($index * 60, 420) }}ms">
    <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg bg-mai-gray">
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
    </div>

    <div class="mt-4 flex flex-1 flex-col">
        <h3 class="text-base font-bold leading-snug text-mai-charcoal">{{ $item['title'] }}</h3>
        <p class="mt-2 text-sm leading-relaxed text-mai-slate line-clamp-2">{{ $item['description'] }}</p>
        <a
            href="{{ $item['wa_url'] }}"
            target="_blank"
            rel="noopener noreferrer"
            class="mt-3 inline-flex items-center gap-2 text-sm font-semibold text-mai-red transition-colors duration-200 hover:text-mai-wine lg:mt-4"
        >
            Tanya produk ini <span aria-hidden="true">&rarr;</span>
        </a>
    </div>
</article>
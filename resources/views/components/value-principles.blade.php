@props([
    'eyebrow' => 'Keunggulan Kami',
    'heading' => null,
    'principles' => [], // array of ['title' => string, 'description' => string]
    'class' => '',
])

@php
    $principles = $principles ?: config('company.advantages');
    $count = count($principles);
    $defaultHeading = 'Lebih dari sekadar produksi, kami membangun proses yang dapat diandalkan.';
    $gridClass = match(true) {
        $count <= 2 => 'sm:grid-cols-2',
        $count == 3 => 'sm:grid-cols-3',
        default => 'sm:grid-cols-2 lg:grid-cols-4',
    };
@endphp

<section class="bg-white py-20 sm:py-28">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl">
            <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">{{ $eyebrow }}</p>
            <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl lg:text-5xl" style="--reveal-delay: 60ms">
                {{ $heading ?? $defaultHeading }}
            </h2>
        </div>

        <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-12 {{ $gridClass }}">
            @foreach($principles as $i => $item)
                <div class="reveal group" style="--reveal-delay: {{ $i * 80 }}ms">
                    <div class="flex items-baseline gap-4">
                        <span class="text-xs font-black text-mai-red/40 transition-colors duration-200 group-hover:text-mai-red">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <span class="h-px flex-1 bg-mai-border transition-colors duration-200 group-hover:bg-mai-red/30" aria-hidden="true"></span>
                    </div>
                    <h3 class="mt-6 text-lg font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

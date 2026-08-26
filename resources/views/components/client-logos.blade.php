@php
    $b2b = config('company.clients.b2b', []);
    $b2g = config('company.clients.b2g', []);
@endphp

<div class="space-y-14">
    <div>
        <div class="mb-8 flex items-center gap-4">
            <span class="text-xs font-bold uppercase tracking-widest text-mai-red">Klien B2B</span>
            <div class="h-px flex-1 bg-mai-border"></div>
        </div>
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
            @foreach($b2b as $client)
                <div class="reveal flex h-20 items-center justify-center rounded-lg border border-mai-border bg-white p-4 grayscale transition-all duration-200 hover:-translate-y-0.5 hover:grayscale-0 hover:shadow-sm" style="--reveal-delay: {{ min($loop->index * 40, 320) }}ms">
                    <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}" class="max-h-full max-w-full object-contain" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <div class="mb-8 flex items-center gap-4">
            <span class="text-xs font-bold uppercase tracking-widest text-mai-red">Klien B2G &amp; BUMN</span>
            <div class="h-px flex-1 bg-mai-border"></div>
        </div>
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-6">
            @foreach($b2g as $client)
                <div class="reveal flex h-20 items-center justify-center rounded-lg border border-mai-border bg-white p-4 grayscale transition-all duration-200 hover:-translate-y-0.5 hover:grayscale-0 hover:shadow-sm" style="--reveal-delay: {{ min($loop->index * 40, 320) }}ms">
                    <img src="{{ asset($client['logo']) }}" alt="{{ $client['name'] }}" class="max-h-full max-w-full object-contain" loading="lazy">
                </div>
            @endforeach
        </div>
    </div>
</div>

@props(['steps'])

@php
    $icons = [
        'chat' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
        'pencil' => 'M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z',
        'swatch' => 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-3.5M7 17h.01',
        'scissors' => 'M6 6a3 3 0 100 0zm0 0l12 12M6 18a3 3 0 100 0zm0 0L18 6',
        'needle' => 'M14 4l6 6-8.5 8.5a2.121 2.121 0 01-3-3L17 6M4 20l3-1 1-3',
        'sparkle' => 'M5 3v4M3 5h4M6 17v4M4 19h4M13 3l1.9 5.8L21 11l-6.1 2.2L13 19l-1.9-5.8L5 11l6.1-2.2L13 3z',
        'box' => 'M20 7L12 3 4 7m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4',
        'truck' => 'M3 7h11v8H3zm11 3h4l3 3v2h-7zM6.5 20a1.5 1.5 0 100-3 1.5 1.5 0 000 3zm12 0a1.5 1.5 0 100-3 1.5 1.5 0 000 3z',
    ];
@endphp

{{-- Desktop: horizontal flow, connected in normal document flow (icon + arrow
     alternate as flex siblings) so the connector never falls out of sync with
     scrolling — the same technique used by <x-company-timeline>. --}}
<div class="hidden lg:block">
    <div class="-mx-4 overflow-x-auto px-4 pb-4">
        <div class="flex w-max items-start">
            @foreach($steps as $step)
                <div class="reveal flex w-40 shrink-0 flex-col items-center text-center" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                    <span class="flex h-14 w-14 items-center justify-center rounded-full border-2 border-mai-red/20 bg-mai-red/5 text-mai-red">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons[$step['icon']] ?? $icons['box'] }}"/>
                        </svg>
                    </span>
                    <span class="mt-3 text-xs font-black text-mai-red/40">{{ sprintf('%02d', $loop->iteration) }}</span>
                    <h3 class="mt-1 text-sm font-bold text-mai-charcoal">{{ $step['title'] }}</h3>
                    <p class="mt-2 text-xs leading-relaxed text-mai-slate">{{ $step['description'] }}</p>
                </div>

                @unless($loop->last)
                    <div class="mt-7 flex w-8 shrink-0 items-center justify-center text-mai-border" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5"><path d="M8 5l8 7-8 7V5z"/></svg>
                    </div>
                @endunless
            @endforeach
        </div>
    </div>
</div>

{{-- Mobile / tablet: vertical flow. --}}
<div class="space-y-0 lg:hidden">
    @foreach($steps as $step)
        <div class="reveal flex gap-5" style="--reveal-delay: {{ min($loop->index * 70, 350) }}ms">
            <div class="flex flex-col items-center">
                <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full border-2 border-mai-red/20 bg-mai-red/5 text-mai-red">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons[$step['icon']] ?? $icons['box'] }}"/>
                    </svg>
                </span>
                @unless($loop->last)
                    <span class="my-1 h-full w-px flex-1 bg-mai-border"></span>
                @endunless
            </div>
            <div class="pb-8">
                <span class="text-xs font-black text-mai-red/40">{{ sprintf('%02d', $loop->iteration) }}</span>
                <h3 class="text-sm font-bold text-mai-charcoal">{{ $step['title'] }}</h3>
                <p class="mt-1 text-xs leading-relaxed text-mai-slate">{{ $step['description'] }}</p>
            </div>
        </div>
    @endforeach
</div>

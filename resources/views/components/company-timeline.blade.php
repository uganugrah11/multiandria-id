@php
    $timeline = config('company.timeline', []);
    $lastIndex = count($timeline) - 1;

    $icons = [
        'home' => 'M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75',
        'document' => 'M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z',
        'map-pin' => 'M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm4.5 0c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z',
        'factory' => 'M3 21h18M4 21V11l3 2 3-2v10M14 21V7l6 3v11',
        'briefcase' => 'M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z',
        'building' => 'M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21',
        'chart' => 'M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941',
        'sparkle' => 'M5 3v4M3 5h4M6 17v4M4 19h4M13 3l1.9 5.8L21 11l-6.1 2.2L13 19l-1.9-5.8L5 11l6.1-2.2L13 3z',
    ];
@endphp

{{-- Desktop: horizontal, scrollable timeline. The connector line runs in normal flow
     as a flex sibling so it stays in sync with the icon nodes — the icons sit directly
     on the line (mt-7 places the dotted connector through the icon's vertical center). --}}
<div class="hidden lg:block">
    <div class="-mx-4 overflow-x-auto px-4 pb-4" style="scroll-snap-type: x proximity;">
        <div class="flex w-max items-stretch">
            @foreach($timeline as $item)
                @php $isLatest = $loop->index === $lastIndex; @endphp

                <div class="reveal flex w-64 shrink-0 flex-col items-start" style="scroll-snap-align: start; --reveal-delay: {{ $loop->index * 90 }}ms">
                    <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl border-2 bg-white text-mai-red shadow-sm transition-colors duration-200 {{ $isLatest ? 'border-mai-red bg-mai-red/10' : 'border-mai-border' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons[$item['icon']] ?? $icons['home'] }}"/>
                        </svg>
                    </span>
                    <span class="mt-4 inline-flex w-fit items-center rounded-full border border-mai-border bg-mai-ivory px-3 py-1 text-xs font-bold uppercase tracking-widest {{ $isLatest ? 'border-mai-red/40 text-mai-red' : 'text-mai-slate' }}">
                        {{ $item['year'] }}
                    </span>

                    <div class="group mt-3 flex w-full flex-1 flex-col rounded-xl border border-mai-border bg-white p-5 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md motion-reduce:hover:translate-y-0">
                        <h3 class="text-sm font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                        @if(is_array($item['description']))
                            <ul class="mt-2 space-y-1.5 text-xs leading-relaxed text-mai-slate">
                                @foreach($item['description'] as $line)
                                    <li class="flex gap-1.5">
                                        <span class="mt-1 h-1 w-1 shrink-0 rounded-full bg-mai-red"></span>
                                        <span>{{ $line }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="mt-2 text-xs leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                        @endif
                    </div>
                </div>

                @unless($loop->last)
                    <div class="mt-7 w-10 shrink-0 self-start border-t-2 border-dotted border-mai-border" aria-hidden="true"></div>
                @endunless
            @endforeach

            {{-- Closing "Sekarang" node — presentational only, not a dated claim. --}}
            <div class="mt-7 w-10 shrink-0 self-start border-t-2 border-dotted border-mai-border" aria-hidden="true"></div>
            <div class="reveal flex w-56 shrink-0 flex-col items-start" style="--reveal-delay: {{ count($timeline) * 90 }}ms">
                <span class="flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-mai-red text-white shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons['sparkle'] }}"/>
                    </svg>
                </span>
                <span class="mt-4 inline-flex w-fit items-center rounded-full bg-mai-red px-3 py-1 text-xs font-bold uppercase tracking-widest text-white">Sekarang</span>
                <div class="mt-3 flex w-full flex-1 flex-col justify-center rounded-xl border border-dashed border-mai-red/40 bg-mai-red/5 p-5">
                    <p class="text-xs leading-relaxed text-mai-charcoal">Berkat kepercayaan Anda, kami terus bertumbuh.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mobile / tablet: vertical timeline with icon nodes on the left rail. --}}
<div class="relative space-y-6 lg:hidden">
    <div class="absolute bottom-3 left-7 top-3 w-px bg-mai-border" aria-hidden="true"></div>

    @foreach($timeline as $item)
        @php $isLatest = $loop->index === $lastIndex; @endphp
        <div class="reveal relative flex gap-4" style="--reveal-delay: {{ min($loop->index * 70, 350) }}ms">
            <span class="relative z-10 flex h-14 w-14 shrink-0 items-center justify-center rounded-xl border-2 bg-white text-mai-red transition-colors duration-200 {{ $isLatest ? 'border-mai-red bg-mai-red/10' : 'border-mai-border' }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons[$item['icon']] ?? $icons['home'] }}"/>
                </svg>
            </span>
            <div class="-mt-0.5 flex-1 rounded-xl border border-mai-border bg-white p-5">
                <span class="inline-flex items-center rounded-full border border-mai-border bg-mai-ivory px-3 py-1 text-xs font-bold uppercase tracking-widest {{ $isLatest ? 'border-mai-red/40 text-mai-red' : 'text-mai-slate' }}">{{ $item['year'] }}</span>
                <h3 class="mt-2 text-sm font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                @if(is_array($item['description']))
                    <ul class="mt-2 space-y-1.5 text-xs leading-relaxed text-mai-slate">
                        @foreach($item['description'] as $line)
                            <li class="flex gap-1.5">
                                <span class="mt-1 h-1 w-1 shrink-0 rounded-full bg-mai-red"></span>
                                <span>{{ $line }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="mt-2 text-xs leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                @endif
            </div>
        </div>
    @endforeach

    <div class="reveal relative flex gap-4" style="--reveal-delay: 400ms">
        <span class="relative z-10 flex h-14 w-14 shrink-0 items-center justify-center rounded-xl bg-mai-red text-white">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $icons['sparkle'] }}"/>
            </svg>
        </span>
        <div class="-mt-0.5 flex-1 rounded-xl border border-dashed border-mai-red/40 bg-mai-red/5 p-5">
            <span class="inline-flex items-center rounded-full bg-mai-red px-3 py-1 text-xs font-bold uppercase tracking-widest text-white">Sekarang</span>
            <p class="mt-2 text-xs leading-relaxed text-mai-charcoal">Berkat kepercayaan Anda, kami terus bertumbuh.</p>
        </div>
    </div>
</div>
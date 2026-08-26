@php
    $timeline = config('company.timeline', []);
    $lastIndex = count($timeline) - 1;
@endphp

{{-- Desktop: horizontal, scrollable timeline with a connected line running through normal flow (so it scrolls in sync with the cards — no absolute-positioned line to fall out of alignment). --}}
<div class="hidden lg:block">
    <div class="-mx-4 overflow-x-auto px-4 pb-4" style="scroll-snap-type: x proximity;">
        <div class="flex w-max items-start">
            @foreach($timeline as $item)
                @php $isLatest = $loop->index === $lastIndex; @endphp

                <div class="reveal flex w-64 shrink-0 flex-col items-start" style="scroll-snap-align: start; --reveal-delay: {{ $loop->index * 90 }}ms">
                    <div class="flex items-center gap-2">
                        <span class="text-xs font-bold uppercase tracking-widest {{ $isLatest ? 'text-mai-red' : 'text-mai-slate' }}">
                            {{ $item['year'] }}
                        </span>
                    </div>
                    <span
                        class="mt-3 block h-4 w-4 rounded-full border-2 transition-colors duration-200 {{ $isLatest ? 'border-mai-red bg-mai-red' : 'border-mai-border bg-white' }}"
                        aria-hidden="true"
                    ></span>

                    <div class="group mt-4 rounded-xl border border-mai-border bg-white p-5 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md">
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
                    <div class="w-10 shrink-0 self-start border-t-2 border-dotted border-mai-border" style="margin-top: 39px"></div>
                @endunless
            @endforeach

            {{-- Closing "Sekarang" node — presentational only, not a dated claim. --}}
            <div class="w-10 shrink-0 self-start border-t-2 border-dotted border-mai-border" style="margin-top: 39px"></div>
            <div class="flex w-56 shrink-0 flex-col items-start">
                <span class="text-xs font-bold uppercase tracking-widest text-mai-red">Sekarang</span>
                <span class="mt-3 block h-4 w-4 rounded-full bg-mai-red" aria-hidden="true"></span>
                <div class="mt-4 rounded-xl border border-dashed border-mai-red/40 bg-mai-red/5 p-5">
                    <p class="text-xs leading-relaxed text-mai-charcoal">Berkat kepercayaan Anda, kami terus bertumbuh.</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Mobile / tablet: vertical timeline, easy to scan without shrinking the horizontal layout. --}}
<div class="relative space-y-6 lg:hidden">
    <div class="absolute left-1.75 top-2 bottom-2 w-px bg-mai-border"></div>

    @foreach($timeline as $item)
        @php $isLatest = $loop->index === $lastIndex; @endphp
        <div class="reveal relative flex gap-5 pl-0" style="--reveal-delay: {{ min($loop->index * 70, 350) }}ms">
            <span
                class="relative z-10 mt-1 block h-4 w-4 shrink-0 rounded-full border-2 {{ $isLatest ? 'border-mai-red bg-mai-red' : 'border-mai-border bg-white' }}"
                aria-hidden="true"
            ></span>
            <div class="-mt-1 flex-1 rounded-xl border border-mai-border bg-white p-5">
                <span class="text-xs font-bold uppercase tracking-widest {{ $isLatest ? 'text-mai-red' : 'text-mai-slate' }}">{{ $item['year'] }}</span>
                <h3 class="mt-1 text-sm font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
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

    <div class="reveal relative flex gap-5" style="--reveal-delay: 400ms">
        <span class="relative z-10 mt-1 block h-4 w-4 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
        <div class="-mt-1 flex-1 rounded-xl border border-dashed border-mai-red/40 bg-mai-red/5 p-5">
            <span class="text-xs font-bold uppercase tracking-widest text-mai-red">Sekarang</span>
            <p class="mt-1 text-xs leading-relaxed text-mai-charcoal">Berkat kepercayaan Anda, kami terus bertumbuh.</p>
        </div>
    </div>
</div>

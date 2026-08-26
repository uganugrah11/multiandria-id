@php $timeline = config('company.timeline', []); @endphp

<div class="relative space-y-8">
    <div class="absolute left-6 top-2 bottom-2 hidden w-px bg-mai-border sm:block"></div>

    @foreach($timeline as $item)
        <div class="relative flex gap-6 sm:pl-0">
            <div class="relative z-10 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-mai-red text-xs font-bold text-white">
                {{ $item['year'] }}
            </div>
            <div class="flex-1 rounded-xl border border-mai-border bg-white p-6">
                <h3 class="text-lg font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                @if(is_array($item['description']))
                    <ul class="mt-2 space-y-1 text-sm leading-relaxed text-mai-slate">
                        @foreach($item['description'] as $line)
                            <li class="flex gap-2">
                                <span class="mt-1.5 h-1 w-1 shrink-0 rounded-full bg-mai-red"></span>
                                <span>{{ $line }}</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                @endif
            </div>
        </div>
    @endforeach
</div>

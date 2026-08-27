@props(['testimonial'])

<figure class="flex h-full flex-col rounded-2xl border border-mai-border bg-white p-8">
    <span class="text-5xl font-black leading-none text-mai-red/20" aria-hidden="true">&ldquo;</span>
    <blockquote class="-mt-3 flex-1 text-base leading-relaxed text-mai-charcoal">
        {{ $testimonial['quote'] }}
    </blockquote>
    <figcaption class="mt-6 flex items-center gap-3 border-t border-mai-border pt-6">
        @if(!empty($testimonial['logo']))
            <img src="{{ asset($testimonial['logo']) }}" alt="{{ $testimonial['company'] }}" class="h-9 w-9 shrink-0 rounded-full object-contain" width="36" height="36">
        @else
            <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-mai-red/10 text-xs font-bold text-mai-red">
                {{ Illuminate\Support\Str::of($testimonial['name'])->substr(0, 1) }}
            </span>
        @endif
        <div>
            <p class="text-sm font-bold text-mai-charcoal">{{ $testimonial['name'] }}</p>
            <p class="text-xs text-mai-slate">
                {{ $testimonial['role'] ?? '' }}{{ !empty($testimonial['role']) && !empty($testimonial['company']) ? ', ' : '' }}{{ $testimonial['company'] ?? '' }}
            </p>
        </div>
    </figcaption>
</figure>

@props([
    'variant' => 'light', // light | dark | editorial
    'stats' => [],        // array of ['value' => string, 'label' => string, 'note' => string|null]
    'columns' => null,    // auto unless overridden
    'class' => '',
])

@php
    $count = count($stats);
    $gridClass = match(true) {
        $columns !== null => $columns,
        $count <= 3 => 'sm:grid-cols-3',
        $count == 4 => 'sm:grid-cols-2 lg:grid-cols-4',
        default => 'sm:grid-cols-2 lg:grid-cols-4',
    };
    $wrapperClass = match($variant) {
        'dark' => 'text-white',
        'editorial' => 'text-mai-charcoal',
        default => 'text-mai-charcoal',
    };
    $borderClass = $variant === 'dark' ? 'border-white/15' : 'border-mai-border';
    $labelClass = match($variant) {
        'dark' => 'text-mai-ivory',
        'editorial' => 'text-mai-slate',
        default => 'text-mai-slate',
    };
@endphp

<div {{ $attributes->class(['grid grid-cols-1 gap-x-8 gap-y-12', $wrapperClass, $gridClass, $class]) }}>
    @foreach($stats as $i => $stat)
        <div class="reveal border-t {{ $borderClass }} pt-8" style="--reveal-delay: {{ $i * 80 }}ms">
            <p class="text-4xl font-black tracking-tight sm:text-5xl lg:text-6xl" data-counter>{{ $stat['value'] }}</p>
            <p class="mt-3 text-sm font-bold uppercase tracking-wider {{ $labelClass }}">{{ $stat['label'] }}</p>
            @if(($stat['note'] ?? null) !== null)
                <p class="mt-2 max-w-xs text-sm leading-relaxed {{ $variant === 'dark' ? 'text-white/45' : 'text-mai-slate' }}">{{ $stat['note'] }}</p>
            @endif
        </div>
    @endforeach
</div>

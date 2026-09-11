@props(['items' => []])

@php
    $items = array_values($items);
    $lastIndex = count($items) - 1;
@endphp
@if(!empty($items))
<nav aria-label="Breadcrumb" {{ $attributes->class(['mb-4']) }}>
    <ol class="flex items-center gap-1.5 text-xs font-semibold">
        @foreach($items as $index => $item)
            <li class="flex items-center gap-1.5">
                @if($index > 0)
                    <span aria-hidden="true" class="text-white/40">/</span>
                @endif
                @if($index === $lastIndex)
                    <span class="text-white/85" aria-current="page">{{ $item['name'] }}</span>
                @else
                    <a href="{{ $item['url'] }}" class="text-white/60 transition-colors duration-200 hover:text-white/90">{{ $item['name'] }}</a>
                @endif
            </li>
        @endforeach
    </ol>
</nav>
@endif

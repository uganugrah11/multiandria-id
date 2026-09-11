@props(['schemas' => []])

@php
    $schemas = collect(is_array($schemas) && array_is_list($schemas) ? $schemas : [$schemas])
        ->filter()
        ->values();

    if ($schemas->isEmpty()) {
        $payload = null;
    } elseif ($schemas->count() === 1) {
        $payload = $schemas->first();
    } else {
        $payload = [
            '@context' => 'https://schema.org',
            '@graph' => $schemas->map(fn (array $schema) => \Illuminate\Support\Arr::except($schema, ['@context']))->all(),
        ];
    }

    $jsonEncodingFlags = JSON_UNESCAPED_UNICODE
        | JSON_UNESCAPED_SLASHES
        | JSON_HEX_TAG
        | JSON_HEX_AMP
        | JSON_HEX_APOS
        | JSON_HEX_QUOT;
@endphp
@if($payload)
<script type="application/ld+json">{!! json_encode($payload, $jsonEncodingFlags) !!}</script>
@endif

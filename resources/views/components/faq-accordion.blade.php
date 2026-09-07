@props(['faqs' => []])

<div x-data="{ open: 0 }" class="space-y-3">
    @foreach($faqs as $index => $faq)
        <div class="reveal overflow-hidden rounded-lg border border-mai-border bg-white transition-colors duration-200 hover:border-mai-red/40" style="--reveal-delay: {{ min($index * 70, 420) }}ms">
            <button @click="open = open === {{ $index }} ? null : {{ $index }}" type="button" :aria-expanded="open === {{ $index }}" aria-controls="faq-panel-{{ $index }}" id="faq-button-{{ $index }}" class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                <span class="text-sm font-bold text-mai-charcoal">{{ $faq['question'] }}</span>
                <span class="shrink-0 text-mai-red transition-transform duration-200" :class="open === {{ $index }} ? 'rotate-45' : ''" aria-hidden="true">+</span>
            </button>
            <div id="faq-panel-{{ $index }}" x-show="open === {{ $index }}" x-transition x-cloak role="region" aria-labelledby="faq-button-{{ $index }}" class="px-6 pb-5 text-sm leading-relaxed text-mai-slate">
                {{ $faq['answer'] }}
            </div>
        </div>
    @endforeach
</div>

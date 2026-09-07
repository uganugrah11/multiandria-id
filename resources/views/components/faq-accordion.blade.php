@props(['faqs' => []])

<div data-faq-accordion class="space-y-3">
    @foreach($faqs as $index => $faq)
        <div class="reveal overflow-hidden rounded-lg border border-mai-border bg-white transition-colors duration-200 hover:border-mai-red/40" style="--reveal-delay: {{ min($index * 70, 420) }}ms">
            <button data-faq-toggle type="button" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faq-panel-{{ $index }}" id="faq-button-{{ $index }}" class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left">
                <span class="text-sm font-bold text-mai-charcoal">{{ $faq['question'] }}</span>
                <span data-faq-icon class="shrink-0 text-mai-red" aria-hidden="true">+</span>
            </button>
            <div data-faq-panel id="faq-panel-{{ $index }}" role="region" aria-labelledby="faq-button-{{ $index }}" class="overflow-hidden" @if($index !== 0) hidden @endif>
                <div data-faq-answer class="px-6 pb-5 text-sm leading-relaxed text-mai-slate">
                    {{ $faq['answer'] }}
                </div>
            </div>
        </div>
    @endforeach
</div>

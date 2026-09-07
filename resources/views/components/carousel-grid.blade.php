@props([
    'id',
    'label',
    'items' => [],
    'cardComponent',
    'viewAllLabel' => 'Lihat Semua',
    'collapseLabel' => 'Sembunyikan',
])

@php
    $items = collect($items);
    $total = $items->count();
    $carouselCount = min($total, 6);
    $carouselItems = $items->take(6);
    $hasMore = $total > 6;
    $moreItems = $items->slice(6);
@endphp

<div
    x-data="{
        index: 0,
        perView: 1,
        expanded: false,
        tX: 0,
        tY: 0,
        get pageCount() {
            return Math.max(1, Math.ceil({{ $carouselCount }} / this.perView));
        },
        get dotArray() {
            return Array.from({ length: this.pageCount });
        },
        init() {
            const mqSm = window.matchMedia('(min-width: 640px)');
            const mqLg = window.matchMedia('(min-width: 1024px)');
            const apply = () => {
                this.perView = mqLg.matches ? 3 : mqSm.matches ? 2 : 1;
                this.index = Math.min(this.index, this.pageCount - 1);
            };
            apply();
            this._mqS = mqSm;
            this._mqL = mqLg;
            this._apply = apply;
            this._mqS.addEventListener('change', this._apply);
            this._mqL.addEventListener('change', this._apply);
        },
        destroy() {
            this._mqS?.removeEventListener('change', this._apply);
            this._mqL?.removeEventListener('change', this._apply);
        },
        goTo(i) {
            this.index = Math.min(Math.max(0, i), this.pageCount - 1);
        },
        next() {
            this.goTo(this.index + 1);
        },
        prev() {
            this.goTo(this.index - 1);
        },
        isCardVisible(i) {
            const start = this.index * this.perView;
            return i >= start && i < start + this.perView;
        },
        slideLabel(i) {
            return 'Slide ' + (i + 1) + ' dari ' + {{ $carouselCount }};
        },
        touchStart(e) {
            const t = e.touches[0];
            this.tX = t.clientX;
            this.tY = t.clientY;
        },
        touchEnd(e) {
            const t = e.changedTouches[0];
            const dx = t.clientX - this.tX;
            const dy = t.clientY - this.tY;
            if (Math.abs(dx) > 40 && Math.abs(dx) > Math.abs(dy)) {
                dx < 0 ? this.next() : this.prev();
            }
        },
        keydownTab(e) {
            let target = null;
            if (e.key === 'ArrowRight') target = Math.min(this.index + 1, this.pageCount - 1);
            else if (e.key === 'ArrowLeft') target = Math.max(this.index - 1, 0);
            else if (e.key === 'Home') target = 0;
            else if (e.key === 'End') target = this.pageCount - 1;
            else return;
            e.preventDefault();
            this.goTo(target);
            document.getElementById('{{ $id }}-dot-' + target)?.focus();
        },
    }"
    role="region"
    aria-roledescription="carousel"
    aria-label="{{ $label }}"
    class="mt-12"
>
    {{-- Track --}}
    <div class="overflow-hidden" @touchstart.passive="touchStart($event)" @touchend.passive="touchEnd($event)">
        <div
            :id="'{{ $id }}-track'"
            class="-mx-3 flex transition-transform duration-500 ease-out motion-reduce:transition-none lg:-mx-4"
            :style="'transform: translateX(-' + (index * 100) + '%)'"
        >
            @foreach($carouselItems as $index => $item)
                <div
                    class="w-full shrink-0 px-3 sm:w-1/2 lg:w-1/3 lg:px-4"
                    role="group"
                    aria-roledescription="slide"
                    :aria-label="slideLabel({{ $index }})"
                    :aria-hidden="isCardVisible({{ $index }}) ? 'false' : 'true'"
                    :inert="!isCardVisible({{ $index }})"
                >
                    <x-dynamic-component :component="$cardComponent" :item="$item" :index="$index" />
                </div>
            @endforeach
        </div>
    </div>

    {{-- Navigation: arrows + dot indicators --}}
    @if($carouselCount > 1)
        <div class="mt-10 flex items-center justify-center gap-6">
            <button
                type="button"
                @click="prev()"
                :disabled="index === 0"
                aria-label="Slide sebelumnya"
                :aria-controls="'{{ $id }}-track'"
                class="flex h-12 w-12 items-center justify-center rounded-lg bg-mai-white text-mai-charcoal shadow-card transition-all duration-200 hover:shadow-card-hover hover:text-mai-red disabled:pointer-events-none disabled:opacity-40 motion-reduce:transition-none"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            </button>

            <div
                role="tablist"
                aria-label="Navigasi slide"
                class="flex items-center gap-2"
                @keydown="keydownTab($event)"
            >
                <template x-for="(p, i) in dotArray" :key="i">
                    <button
                        type="button"
                        role="tab"
                        :id="'{{ $id }}-dot-' + i"
                        :aria-selected="index === i ? 'true' : 'false'"
                        :aria-label="'Ke slide ' + (i + 1) + ' dari ' + pageCount"
                        :tabindex="index === i ? 0 : -1"
                        :aria-controls="'{{ $id }}-track'"
                        @click="goTo(i)"
                        class="h-2 rounded-full transition-all duration-200 motion-reduce:transition-none"
                        :class="index === i ? 'w-6 bg-mai-red' : 'w-2 bg-mai-border'"
                    ></button>
                </template>
            </div>

            <button
                type="button"
                @click="next()"
                :disabled="index === pageCount - 1"
                aria-label="Slide berikutnya"
                :aria-controls="'{{ $id }}-track'"
                class="flex h-12 w-12 items-center justify-center rounded-lg bg-mai-white text-mai-charcoal shadow-card transition-all duration-200 hover:shadow-card-hover hover:text-mai-red disabled:pointer-events-none disabled:opacity-40 motion-reduce:transition-none"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </button>
        </div>
    @endif

    {{-- Inline expand: remaining items revealed as a static grid --}}
    @if($hasMore)
        <div class="mt-6 flex justify-center">
            <button
                type="button"
                @click="expanded = !expanded"
                :aria-expanded="expanded ? 'true' : 'false'"
                :aria-controls="'{{ $id }}-more'"
                class="inline-flex items-center gap-2 text-sm font-semibold text-mai-charcoal underline-offset-4 transition-colors duration-200 hover:text-mai-red hover:underline motion-reduce:transition-none"
            >
                <span x-text="expanded ? '{{ $collapseLabel }}' : '{{ $viewAllLabel }}'"></span>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 transition-transform duration-200 motion-reduce:transition-none" :class="expanded && 'rotate-180'" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
        </div>

        <div
            :id="'{{ $id }}-more'"
            x-show="expanded"
            x-cloak
            class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 lg:gap-8"
        >
            @foreach($moreItems as $index => $item)
                <x-dynamic-component :component="$cardComponent" :item="$item" :index="$index + $carouselCount" />
            @endforeach
        </div>
    @endif
</div>
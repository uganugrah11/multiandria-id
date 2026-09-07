@props(['id', 'label', 'items' => [], 'cardComponent'])

@php
    $items = collect($items)->values();
    $total = $items->count();
@endphp

@if($total)
    <div
        x-data="{
            index: 0,
            perView: 1,
            measure: 0,
            enteredViewport: false,
            touchX: 0,
            touchY: 0,
            get pageCount() { return Math.max(1, Math.ceil({{ $total }} / this.perView)); },
            get usesCounter() { return this.pageCount > 8; },
            get dotArray() { return Array.from({ length: this.pageCount }); },
            init() {
                const mqMd = window.matchMedia('(min-width: 768px)');
                const mqLg = window.matchMedia('(min-width: 1024px)');
                const applyBreakpoint = () => {
                    this.perView = mqLg.matches ? 3 : mqMd.matches ? 2 : 1;
                    this.index = Math.min(this.index, this.pageCount - 1);
                    this.measure++;
                    this.$nextTick(() => this.syncImageLoading());
                };
                this._mqMd = mqMd;
                this._mqLg = mqLg;
                this._applyBreakpoint = applyBreakpoint;
                mqMd.addEventListener('change', applyBreakpoint);
                mqLg.addEventListener('change', applyBreakpoint);
                window.addEventListener('resize', applyBreakpoint, { passive: true });
                applyBreakpoint();
                this._imageObserver = new IntersectionObserver(([entry]) => {
                    if (entry.isIntersecting) {
                        this.enteredViewport = true;
                        this.syncImageLoading();
                        this._imageObserver.disconnect();
                    }
                }, { rootMargin: '200px 0px' });
                this._imageObserver.observe(this.$el);
            },
            destroy() {
                this._mqMd?.removeEventListener('change', this._applyBreakpoint);
                this._mqLg?.removeEventListener('change', this._applyBreakpoint);
                window.removeEventListener('resize', this._applyBreakpoint);
                this._imageObserver?.disconnect();
            },
            goTo(nextIndex) {
                this.index = Math.min(Math.max(0, nextIndex), this.pageCount - 1);
                this.$nextTick(() => this.syncImageLoading());
            },
            next() { this.goTo(this.index + 1); },
            prev() { this.goTo(this.index - 1); },
            isCardVisible(cardIndex) {
                const start = this.index * this.perView;
                return cardIndex >= start && cardIndex < start + this.perView;
            },
            slideLabel() { return 'Slide ' + (this.index + 1) + ' dari ' + this.pageCount; },
            slideDistance() {
                this.measure;
                const firstCard = this.$refs.track?.querySelector('[data-carousel-card]');
                return firstCard ? firstCard.offsetWidth * this.perView : this.$refs.viewport?.clientWidth || 0;
            },
            transformStyle() { return 'transform: translateX(-' + (this.index * this.slideDistance()) + 'px)'; },
            syncImageLoading() {
                if (!this.enteredViewport) return;
                this.$refs.track?.querySelectorAll('[data-carousel-card]').forEach((card) => {
                    if (this.isCardVisible(Number(card.dataset.carouselCard))) {
                        card.querySelectorAll('img[loading]').forEach((image) => { image.loading = 'eager'; });
                    }
                });
            },
            touchStart(event) {
                const touch = event.touches[0];
                this.touchX = touch.clientX;
                this.touchY = touch.clientY;
            },
            touchEnd(event) {
                const touch = event.changedTouches[0];
                const deltaX = touch.clientX - this.touchX;
                const deltaY = touch.clientY - this.touchY;
                if (Math.abs(deltaX) > 40 && Math.abs(deltaX) > Math.abs(deltaY)) deltaX < 0 ? this.next() : this.prev();
            },
            keydownDots(event) {
                let nextIndex = null;
                if (event.key === 'ArrowRight') nextIndex = Math.min(this.index + 1, this.pageCount - 1);
                else if (event.key === 'ArrowLeft') nextIndex = Math.max(this.index - 1, 0);
                else if (event.key === 'Home') nextIndex = 0;
                else if (event.key === 'End') nextIndex = this.pageCount - 1;
                else return;
                event.preventDefault();
                this.goTo(nextIndex);
                this.$nextTick(() => document.getElementById('{{ $id }}-dot-' + nextIndex)?.focus());
            },
        }"
        role="region"
        aria-roledescription="carousel"
        aria-label="{{ $label }}"
        class="mt-12"
    >
        <p class="sr-only" aria-live="polite" aria-atomic="true" x-text="slideLabel()"></p>

        <div x-ref="viewport" class="overflow-hidden" role="group" aria-roledescription="slide" :aria-label="slideLabel()" @touchstart.passive="touchStart($event)" @touchend.passive="touchEnd($event)">
            <div x-ref="track" id="{{ $id }}-track" class="-mx-3 flex transition-transform duration-500 ease-out motion-reduce:transition-none lg:-mx-4" :style="transformStyle()">
                @foreach($items as $itemIndex => $item)
                    <div data-carousel-card="{{ $itemIndex }}" class="w-full shrink-0 px-3 md:w-1/2 lg:w-1/3 lg:px-4" :aria-hidden="isCardVisible({{ $itemIndex }}) ? 'false' : 'true'" :inert="!isCardVisible({{ $itemIndex }})">
                        <x-dynamic-component :component="$cardComponent" :item="$item" :index="$itemIndex" />
                    </div>
                @endforeach
            </div>
        </div>

        @if($total > 1)
            <div class="mt-10 flex items-center justify-center gap-6">
                <button type="button" @click="prev()" :disabled="index === 0" aria-label="Slide sebelumnya" aria-controls="{{ $id }}-track" class="flex h-12 w-12 items-center justify-center rounded-lg bg-mai-white text-mai-charcoal shadow-card transition-all duration-200 hover:shadow-card-hover hover:text-mai-red disabled:pointer-events-none disabled:opacity-40 motion-reduce:transition-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <template x-if="!usesCounter">
                    <div role="tablist" aria-label="Navigasi slide" class="flex items-center gap-2" @keydown="keydownDots($event)">
                        <template x-for="(page, pageIndex) in dotArray" :key="pageIndex">
                            <button type="button" role="tab" :id="'{{ $id }}-dot-' + pageIndex" :aria-selected="index === pageIndex ? 'true' : 'false'" :aria-label="'Ke slide ' + (pageIndex + 1) + ' dari ' + pageCount" :tabindex="index === pageIndex ? 0 : -1" aria-controls="{{ $id }}-track" @click="goTo(pageIndex)" class="h-2 rounded-full transition-all duration-200 motion-reduce:transition-none" :class="index === pageIndex ? 'w-6 bg-mai-red' : 'w-2 bg-mai-border'"></button>
                        </template>
                    </div>
                </template>

                <p x-show="usesCounter" class="min-w-16 text-center text-sm font-semibold tabular-nums text-mai-charcoal" aria-live="polite" aria-atomic="true"><span x-text="index + 1"></span> / <span x-text="pageCount"></span></p>

                <button type="button" @click="next()" :disabled="index === pageCount - 1" aria-label="Slide berikutnya" aria-controls="{{ $id }}-track" class="flex h-12 w-12 items-center justify-center rounded-lg bg-mai-white text-mai-charcoal shadow-card transition-all duration-200 hover:shadow-card-hover hover:text-mai-red disabled:pointer-events-none disabled:opacity-40 motion-reduce:transition-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        @endif
    </div>
@endif

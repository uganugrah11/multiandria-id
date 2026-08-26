@props(['testimonials'])

@php $count = count($testimonials); @endphp

@if($count > 0)
    <div
        x-data="{
            active: 0,
            init() {
                const track = this.$refs.track;
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            this.active = Array.from(track.children).indexOf(entry.target);
                        }
                    });
                }, { root: track, threshold: 0.6 });
                Array.from(track.children).forEach((child) => observer.observe(child));
            },
            goTo(index) {
                const count = {{ $count }};
                this.active = ((index % count) + count) % count;
                this.$refs.track.children[this.active]?.scrollIntoView({ behavior: 'smooth', inline: 'start', block: 'nearest' });
            },
        }"
        @keydown.left="goTo(active - 1)"
        @keydown.right="goTo(active + 1)"
        role="region"
        aria-roledescription="carousel"
        aria-label="Testimoni pelanggan"
        tabindex="0"
        class="focus:outline-none"
    >
        <div class="relative">
            <div
                x-ref="track"
                class="-mx-4 flex snap-x snap-mandatory gap-6 overflow-x-auto scroll-smooth px-4 pb-2"
            >
                @foreach($testimonials as $testimonial)
                    <div class="w-[85%] shrink-0 snap-start sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]">
                        <x-testimonial-card :testimonial="$testimonial" />
                    </div>
                @endforeach
            </div>
        </div>

        @if($count > 1)
            <div class="mt-8 flex items-center justify-center gap-6">
                <button
                    @click="goTo(active - 1)"
                    type="button"
                    aria-label="Testimoni sebelumnya"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-mai-border text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-red hover:text-mai-red motion-reduce:hover:translate-y-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div class="flex items-center gap-2">
                    @foreach($testimonials as $i => $testimonial)
                        <button
                            @click="goTo({{ $i }})"
                            type="button"
                            :aria-current="active === {{ $i }}"
                            aria-label="Ke testimoni {{ $i + 1 }}"
                            class="h-2 rounded-full bg-mai-border transition-all duration-200"
                            :class="active === {{ $i }} ? '!bg-mai-red w-6' : 'w-2'"
                        ></button>
                    @endforeach
                </div>

                <button
                    @click="goTo(active + 1)"
                    type="button"
                    aria-label="Testimoni berikutnya"
                    class="flex h-10 w-10 items-center justify-center rounded-full border border-mai-border text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-red hover:text-mai-red motion-reduce:hover:translate-y-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        @endif
    </div>
@else
    {{-- CONTENT NEEDED: no verified testimonials exist yet (see docs/CONTENT_AUDIT.md).
         This designed empty state holds the section's place without fabricating quotes. --}}
    <div class="rounded-2xl border border-dashed border-mai-border bg-white p-10 text-center sm:p-14">
        <span class="text-5xl font-black leading-none text-mai-red/15" aria-hidden="true">&ldquo;</span>
        <p class="-mt-3 text-sm leading-relaxed text-mai-slate">
            Testimoni pelanggan kami akan segera hadir di sini.
        </p>
    </div>
@endif

<x-layouts.app>

    {{-- 1. Hero — animates on load, not on scroll, since it's already in view --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-32">
            <div>
                <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red" style="--reveal-delay: 0ms">PT. Multi Andria Indonesia</p>
                <h1 class="animate-fade-up mt-4 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl" style="--reveal-delay: 80ms">
                    Partner Produksi Garment untuk Bisnis dan Institusi Anda
                </h1>
                <p class="animate-fade-up mt-6 max-w-lg text-lg leading-relaxed text-white/70" style="--reveal-delay: 160ms">
                    Produksi garment dan tekstil custom untuk kebutuhan brand, perusahaan, sekolah, dan pemerintahan — dari konsultasi sampai produksi selesai.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg">Konsultasi via WhatsApp</x-whatsapp-button>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/30 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        Lihat Produk
                    </a>
                </div>
            </div>

            <div class="reveal-scale relative aspect-4/5 overflow-hidden rounded-2xl border border-white/10 bg-white/5 lg:aspect-square" style="--reveal-delay: 120ms">
                <div class="flex h-full items-center justify-center p-10 text-center text-sm text-white/40">
                    [CONTENT NEEDED — foto produksi/factory asli PT. Multi Andria Indonesia akan tampil di sini]
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Company Introduction + Timeline --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Sejak 2014" align="center" class="reveal mx-auto">
                Dari konveksi kecil di Bintaro, kini melayani bisnis dan institusi di seluruh Indonesia
            </x-section-heading>
            <p class="reveal mx-auto mt-6 max-w-2xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                PT. Multi Andria Indonesia berdiri sejak 2014 dan resmi berbadan hukum pada 2018. Kini kami mengoperasikan kantor pusat, fasilitas produksi, dan warehouse di Bintaro, serta fasilitas produksi dan warehouse di Sukabumi — melayani klien B2B maupun B2G/BUMN.
            </p>
            <a href="{{ route('about') }}" class="reveal mt-6 inline-flex items-center gap-1 text-sm font-semibold text-mai-red transition-transform duration-200 hover:gap-2 hover:text-mai-wine" style="--reveal-delay: 100ms">
                Selengkapnya tentang kami &rarr;
            </a>
        </div>

        <div class="mx-auto mt-16 max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-company-timeline />
        </div>
    </section>

    {{-- 3. Trust / Statistics --}}
    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    {{-- 4. Product Categories --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Kapabilitas Produk" align="center" class="reveal mx-auto">
                Kami memproduksi berbagai kategori garment
            </x-section-heading>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach(\App\Models\Product::productTypes() as $slug => $label)
                    <a
                        href="{{ route('products.index', ['type' => $slug]) }}"
                        class="reveal group rounded-xl border border-mai-border bg-white p-6 text-center transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md"
                        style="--reveal-delay: {{ min($loop->index * 60, 360) }}ms"
                    >
                        <p class="text-sm font-bold text-mai-charcoal transition-colors group-hover:text-mai-red">{{ $label }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-sm font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    {{-- 5. Manufacturing Capabilities --}}
    <section class="bg-mai-charcoal py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Kapabilitas Produksi" align="center" class="reveal mx-auto">
                <span class="text-white">Dari konsultasi sampai produk jadi</span>
            </x-section-heading>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-5">
                @foreach(['Desain', 'Pemilihan Bahan', 'Penjahitan & Perapihan', 'Pengemasan', 'Pengiriman'] as $step)
                    <div class="reveal rounded-xl border border-white/10 bg-white/5 p-6 text-center transition-colors duration-200 hover:border-mai-red/40" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <p class="text-sm font-bold text-white">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
            <p class="reveal mx-auto mt-8 max-w-2xl text-center text-sm text-white/50">
                Quality Control kami komprehensif di setiap tahap, dari desain sampai pengiriman.
                Tersedia dalam dua model kerja sama —
                <a href="{{ route('services') }}" class="font-semibold text-mai-soft-red hover:text-white">Jasa CMT dan Jasa FOB</a>.
            </p>

            <div class="reveal mt-10 text-center">
                <x-whatsapp-button
                    size="lg"
                    :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
                >
                    Konsultasikan Kebutuhan Produksi
                </x-whatsapp-button>
            </div>
        </div>
    </section>

    {{-- 6. Why Multi Andria — verbatim "Keunggulan Kami" from the Company Profile,
         shared with about.blade.php via config('company.advantages') so both
         pages state the same thing the same way. --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Keunggulan Kami" align="center" class="reveal mx-auto">
                3 poin keunggulan kami dibanding kompetitor
            </x-section-heading>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-3">
                @foreach(config('company.advantages') as $item)
                    <div class="reveal rounded-xl border border-mai-border p-6 transition-all duration-200 hover:-translate-y-1 hover:shadow-md" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-mai-red/10 text-sm font-black text-mai-red">
                            {{ $loop->iteration }}
                        </span>
                        <h3 class="mt-4 text-base font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Portfolio (preview) --}}
    @if($featuredPortfolio->isNotEmpty())
        <section class="bg-mai-ivory py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-heading eyebrow="Portfolio" class="reveal">Hasil produksi kami</x-section-heading>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($featuredPortfolio as $project)
                        <div class="reveal group overflow-hidden rounded-xl border border-mai-border bg-white" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                            <div class="aspect-square overflow-hidden bg-mai-gray">
                                @if($project->cover_image_url)
                                    <img src="{{ $project->cover_image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105">
                                @endif
                            </div>
                            <div class="p-4">
                                <p class="text-sm font-bold text-mai-charcoal">{{ $project->title }}</p>
                                @if($project->client_name)
                                    <p class="text-xs text-mai-slate">{{ $project->client_name }} @if($project->year) &middot; {{ $project->year }} @endif</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="reveal mt-10 text-center">
                    <x-whatsapp-button variant="secondary" size="md">Buat Produk Serupa</x-whatsapp-button>
                </div>
            </div>
        </section>
    @endif

    {{-- 7b. Testimonials — no fabricated quotes; see config('company.testimonials')
         and docs/CONTENT_AUDIT.md. Section still appears (with a designed empty
         state) rather than being silently removed, per instruction. --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Testimoni" align="center" class="reveal mx-auto">
                Apa kata klien kami
            </x-section-heading>
            <div class="reveal mt-12" style="--reveal-delay: 100ms">
                <x-testimonial-carousel :testimonials="config('company.testimonials')" />
            </div>
        </div>
    </section>

    {{-- 8. Client / Trust Signals --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Klien Kami" align="center" class="reveal mx-auto">
                Dipercaya oleh brand dan institusi terkemuka
            </x-section-heading>
            <div class="reveal mt-12" style="--reveal-delay: 100ms">
                <x-client-logos />
            </div>
        </div>
    </section>

    {{-- 9. FAQ --}}
    <section class="bg-white py-20 sm:py-24" x-data="{ open: 0 }">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="FAQ" align="center" class="reveal mx-auto">
                Pertanyaan yang sering diajukan
            </x-section-heading>

            <div class="mt-12 space-y-3">
                @php
                    $faqs = [
                        [
                            'q' => 'Bagaimana cara mendapatkan penawaran harga?',
                            'a' => 'Hubungi kami langsung melalui WhatsApp dengan detail kebutuhan Anda (jenis produk, jumlah, dan spesifikasi), tim kami akan membantu proses konsultasi dan penawaran.',
                        ],
                        [
                            'q' => 'Apakah bisa custom desain?',
                            'a' => 'Ya, kami menerima produksi dengan desain custom sesuai kebutuhan Anda.',
                        ],
                    ];
                @endphp
                @foreach($faqs as $index => $faq)
                    <div class="reveal overflow-hidden rounded-xl border border-mai-border bg-white transition-colors duration-200 hover:border-mai-red/40" style="--reveal-delay: {{ $index * 70 }}ms">
                        <button
                            @click="open = open === {{ $index }} ? null : {{ $index }}"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
                        >
                            <span class="text-sm font-bold text-mai-charcoal">{{ $faq['q'] }}</span>
                            <span class="text-mai-red transition-transform duration-200" :class="open === {{ $index }} ? 'rotate-45' : ''" aria-hidden="true">+</span>
                        </button>
                        <div x-show="open === {{ $index }}" x-transition x-cloak class="px-6 pb-5 text-sm leading-relaxed text-mai-slate">
                            {{ $faq['a'] }}
                        </div>
                    </div>
                @endforeach
                <p class="pt-2 text-center text-xs text-mai-slate">
                    [CONTENT NEEDED — pertanyaan FAQ lain (MOQ, lead time, CMT/FOB, dll) menunggu konfirmasi bisnis. Lihat docs/CONTENT_REQUIREMENTS.md.]
                </p>
            </div>
        </div>
    </section>

    {{-- 10. Final CTA --}}
    <section class="bg-mai-red py-20 sm:py-28">
        <div class="reveal mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Siap Memulai Produksi?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/80">
                Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/{{ config('company.whatsapp.number') }}?text={{ rawurlencode(config('company.whatsapp.default_message')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-8 py-4 text-base font-semibold text-mai-red shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-mai-ivory hover:shadow-md motion-reduce:hover:translate-y-0">
                    Konsultasi via WhatsApp
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                    Lihat Produk
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

<x-layouts.app>

    {{-- 1. Hero — full-bleed production photography. Decorative image (alt="") since
         the headline carries the message; role=presentation keeps it out of the
         accessibility tree. Scrim guarantees WCAG contrast for white text. --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <img
            src="{{ asset('images/factory/a-group-of-people-working-4.jpg') }}"
            alt=""
            role="presentation"
            class="absolute inset-0 h-full w-full object-cover"
            width="1024"
            height="806"
            fetchpriority="high"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-mai-charcoal/95 via-mai-charcoal/75 to-mai-charcoal/30"></div>
        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-mai-charcoal to-transparent"></div>

        <div class="relative mx-auto flex min-h-[78vh] max-w-7xl items-center px-4 py-24 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red" style="--reveal-delay: 0ms">PT. Multi Andria Indonesia</p>
                <h1 class="animate-fade-up mt-5 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl" style="--reveal-delay: 80ms">
                    Partner Produksi Garment untuk Bisnis dan Institusi Anda
                </h1>
                <p class="animate-fade-up mt-6 max-w-lg text-lg leading-relaxed text-white/75" style="--reveal-delay: 160ms">
                    Produksi garment dan tekstil custom untuk kebutuhan brand, perusahaan, sekolah, dan pemerintahan — dari konsultasi sampai produksi selesai.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg">Konsultasi via WhatsApp</x-whatsapp-button>
                    <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/35 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        Lihat Portofolio
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Company Introduction — editorial statement, then the timeline. --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">Sejak 2014</p>
            <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl lg:text-5xl" style="--reveal-delay: 60ms">
                Dari konveksi kecil di Bintaro, kini melayani bisnis dan institusi di seluruh Indonesia
            </h2>
            <p class="reveal mx-auto mt-6 max-w-2xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 120ms">
                PT. Multi Andria Indonesia berdiri sejak 2014 dan resmi berbadan hukum pada 2018. Kini kami mengoperasikan kantor pusat, fasilitas produksi, dan warehouse di Bintaro, serta fasilitas produksi dan warehouse di Sukabumi — melayani klien B2B maupun B2G/BUMN.
            </p>
            <a href="{{ route('about') }}" class="reveal mt-6 inline-flex items-center gap-1 text-sm font-semibold text-mai-red transition-transform duration-200 hover:gap-2 hover:text-mai-wine" style="--reveal-delay: 160ms">
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

    {{-- 4. Product Categories — editorial capability index, not a card grid. --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">Kapabilitas Produk</p>
                <h2 class="reveal mt-3 text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl" style="--reveal-delay: 60ms">
                    Kami memproduksi berbagai kategori garment
                </h2>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-x-12 sm:grid-cols-2 lg:grid-cols-3">
                @foreach(\App\Models\Product::productTypes() as $slug => $label)
                    <a
                        href="{{ route('portfolio', ['type' => $slug]).'#produk' }}"
                        class="reveal group flex items-center gap-4 border-t border-mai-border py-5 transition-colors duration-200 hover:border-mai-red"
                        style="--reveal-delay: {{ min($loop->index * 40, 300) }}ms"
                    >
                        <span class="text-xs font-black text-mai-red/30 transition-colors duration-200 group-hover:text-mai-red">{{ sprintf('%02d', $loop->iteration) }}</span>
                        <span class="flex-1 text-base font-bold text-mai-charcoal transition-colors duration-200 group-hover:text-mai-red">{{ $label }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 text-mai-slate transition-all duration-200 group-hover:translate-x-1 group-hover:text-mai-red" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                @endforeach
            </div>

            <div class="reveal mt-10" style="--reveal-delay: 80ms">
                <a href="{{ route('portfolio').'#produk' }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-sm font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    {{-- 5. Manufacturing Capabilities — numbered editorial process ledger. --}}
    <section class="bg-mai-charcoal py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-bold leading-tight text-white sm:text-4xl">
                    Dari konsultasi sampai produk jadi
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-white/60" style="--reveal-delay: 60ms">
                    Kapabilitas produksi kami mencakup seluruh proses — dengan pengawasan Quality Control di setiap tahap.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-5 lg:gap-6">
                @foreach(['Desain', 'Pemilihan Bahan', 'Penjahitan & Perapihan', 'Pengemasan', 'Pengiriman'] as $i => $step)
                    <div class="reveal border-t border-white/15 pt-5 lg:border-l lg:border-t-0 lg:pl-6" style="--reveal-delay: {{ $i * 70 }}ms">
                        <p class="text-3xl font-black text-white/15 transition-colors duration-200">{{ sprintf('%02d', $i + 1) }}</p>
                        <p class="mt-3 text-sm font-bold text-white">{{ $step }}</p>
                    </div>
                @endforeach
            </div>

            <p class="reveal mx-auto mt-10 max-w-2xl text-center text-sm text-white/50" style="--reveal-delay: 80ms">
                Quality Control kami menjamin standar di setiap tahap, dari desain sampai pengiriman.
                Tersedia dalam dua model kerja sama —
                <a href="{{ route('services') }}" class="font-semibold text-mai-soft-red hover:text-white">Jasa CMT dan Jasa FOB</a>.
            </p>

            <div class="reveal mt-10 text-center" style="--reveal-delay: 140ms">
                <x-whatsapp-button
                    size="lg"
                    :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
                >
                    Konsultasikan Kebutuhan Produksi
                </x-whatsapp-button>
            </div>
        </div>
    </section>

    {{-- 6. Why Multi Andria — editorial icon-led ledger rows, verbatim from config. --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl">
                    Keunggulan produksi yang bisa Anda andalkan
                </h2>
            </div>

            @php
                $advantageIcons = [
                    'layers' => 'M12 3l9 4.5-9 4.5-9-4.5L12 3zm0 9l9 4.5-9 4.5-9-4.5L12 12z',
                    'shield' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
                    'chat' => 'M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z',
                ];
            @endphp
            <div class="mt-12 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach(config('company.advantages') as $item)
                    <div class="reveal group border-t border-mai-border pt-8" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                        <span class="flex h-14 w-14 items-center justify-center rounded-xl bg-mai-red/5 text-mai-red ring-1 ring-mai-red/15 transition-all duration-200 motion-reduce:transition-none group-hover:-translate-y-0.5 group-hover:bg-mai-red group-hover:text-white motion-reduce:group-hover:translate-y-0">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-6 w-6" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $advantageIcons[$item['icon']] ?? $advantageIcons['layers'] }}"/>
                            </svg>
                        </span>
                        <p class="mt-4 text-xs font-black uppercase tracking-widest text-mai-red/40">{{ sprintf('%02d', $loop->iteration) }}</p>
                        <h3 class="mt-2 text-lg font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $item['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Portfolio (preview) — featured project emphasis + supporting grid. --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">Portofolio</p>
                <h2 class="reveal mt-3 text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl" style="--reveal-delay: 60ms">
                    Hasil produksi kami
                </h2>
            </div>

            @if($featuredPortfolio->isNotEmpty())
                @php
                    $featured = $featuredPortfolio->first();
                    $rest = $featuredPortfolio->slice(1);
                @endphp
                <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-3">
                    <a href="{{ route('portfolio') }}" class="reveal group relative block overflow-hidden rounded-2xl lg:col-span-2" style="--reveal-delay: 0ms">
                        <div class="aspect-[4/3] overflow-hidden bg-mai-gray">
                            @if($featured->cover_image_url)
                                <img src="{{ $featured->cover_image_url }}" alt="{{ $featured->title }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" width="1200" height="900" loading="lazy">
                            @endif
                        </div>
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-mai-charcoal/90 via-mai-charcoal/50 to-transparent p-6 pt-16">
                            <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">Proyek Unggulan</p>
                            <h3 class="mt-1 text-xl font-bold text-white">{{ $featured->title }}</h3>
                            @if($featured->client_name)
                                <p class="mt-1 text-sm text-white/70">{{ $featured->client_name }} @if($featured->year) &middot; {{ $featured->year }} @endif</p>
                            @endif
                        </div>
                    </a>

                    @if($rest->isNotEmpty())
                        <div class="grid grid-cols-2 gap-6 lg:grid-cols-1">
                            @foreach($rest->take(2) as $project)
                                <a href="{{ route('portfolio') }}" class="reveal group relative block overflow-hidden rounded-2xl bg-mai-gray" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                                    <div class="aspect-square overflow-hidden lg:aspect-[4/3]">
                                        @if($project->cover_image_url)
                                            <img src="{{ $project->cover_image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105" width="900" height="900" loading="lazy">
                                        @endif
                                    </div>
                                    <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-mai-charcoal/85 to-transparent p-4 pt-14">
                                        <h3 class="text-sm font-bold text-white">{{ $project->title }}</h3>
                                        @if($project->client_name)
                                            <p class="mt-0.5 text-xs text-white/70">{{ $project->client_name }}</p>
                                        @endif
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            @else
                <div class="reveal mt-12 rounded-2xl border border-mai-border bg-white p-8 text-center sm:p-12">
                    <p class="text-sm leading-relaxed text-mai-slate">
                        Riwayat proyek kami mencakup produksi untuk Kementerian Kesehatan, MPR RI, Bawaslu, Pertamina, Bank Mandiri, dan Kabupaten Solok Selatan — namun foto proyek nyata belum tersedia untuk ditampilkan di sini.
                    </p>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-mai-red">
                        [CONTENT NEEDED — foto portfolio asli, lihat docs/CONTENT_REQUIREMENTS.md]
                    </p>
                    <div class="mt-8">
                        <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-sm font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                            Jelajahi Portofolio
                        </a>
                    </div>
                </div>
            @endif

            @if($featuredPortfolio->isNotEmpty())
                <div class="reveal mt-10 text-center" style="--reveal-delay: 120ms">
                    <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-sm font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                        Lihat Semua Portofolio
                    </a>
                </div>
            @endif
        </div>
    </section>

    {{-- 8. Testimonials — no fabricated quotes; designed empty state. --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="reveal text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl">Apa kata klien kami</h2>
            </div>
            <div class="reveal mt-12" style="--reveal-delay: 100ms">
                <x-testimonial-carousel :testimonials="config('company.testimonials')" />
            </div>
        </div>
    </section>

    {{-- 9. Client / Trust Signals --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="reveal text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl">Dipercaya oleh brand dan institusi terkemuka</h2>
            </div>
            <div class="reveal mt-12" style="--reveal-delay: 100ms">
                <x-client-logos />
            </div>
        </div>
    </section>

    {{-- 10. FAQ --}}
    <section class="bg-white py-20 sm:py-24" x-data="{ open: 0 }">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="reveal text-3xl font-bold leading-tight text-mai-charcoal sm:text-4xl">Pertanyaan yang sering diajukan</h2>
            </div>

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
                            type="button"
                            :aria-expanded="open === {{ $index }}"
                            :aria-controls="'faq-panel-{{ $index }}'"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
                        >
                            <span class="text-sm font-bold text-mai-charcoal">{{ $faq['q'] }}</span>
                            <span class="text-mai-red transition-transform duration-200" :class="open === {{ $index }} ? 'rotate-45' : ''" aria-hidden="true">+</span>
                        </button>
                        <div
                            :id="'faq-panel-{{ $index }}'"
                            x-show="open === {{ $index }}"
                            x-transition
                            x-cloak
                            class="px-6 pb-5 text-sm leading-relaxed text-mai-slate"
                            role="region"
                        >
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

    {{-- 11. Final CTA --}}
    <x-cta-section
        heading="Siap Memulai Produksi?"
        description="Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
        secondary-label="Lihat Produk"
        secondary-url="{{ route('portfolio').'#produk' }}"
    />

</x-layouts.app>
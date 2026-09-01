<x-layouts.app title="Layanan" description="PT Multi Andria Indonesia — Clothing Design & Production dalam dua model kerja sama: Jasa CMT dan Jasa FOB. Proses produksi dengan Quality Control dari desain hingga pengiriman.">

    {{-- 1. Hero — full-bleed production facility photograph.
         Assigned by the project owner as the Layanan/manufacturing hero.
         Decorative image (headline carries the message); NOT the HQ/office photo. --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <img
            src="{{ asset('images/factory/a-factory-with-lots-of.jpg') }}"
            alt=""
            role="presentation"
            class="absolute inset-0 h-full w-full object-cover"
            width="1024"
            height="664"
            fetchpriority="high"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-mai-charcoal/95 via-mai-charcoal/75 to-mai-charcoal/30"></div>
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-mai-charcoal to-transparent"></div>

        <div class="relative mx-auto flex min-h-[82vh] max-w-7xl items-center px-4 pt-32 pb-20 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Layanan</p>
                <h1 class="animate-fade-up mt-5 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl" style="--reveal-delay: 80ms">
                    Layanan produksi garment untuk bisnis, institusi, dan pemerintahan
                </h1>
                <p class="animate-fade-up mt-6 max-w-xl text-lg leading-relaxed text-white/80" style="--reveal-delay: 160ms">
                    Keahlian utama kami adalah Clothing Design &amp; Production — tersedia dalam model kerja sama Jasa CMT dan Jasa FOB.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai proses dan kebutuhan produksi garment.'">
                        Konsultasi via WhatsApp
                    </x-whatsapp-button>
                    <a href="#proses-produksi" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/35 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        Lihat Proses Produksi
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. CMT & FOB — two clearly-scoped cooperation models. Verified copy only. --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Dua model kerja sama yang jelas, sesuai kebutuhan Anda
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                    Pilih seberapa banyak proses produksi yang ingin Anda kelola sendiri — kami menyesuaikan dengan kebutuhan Anda.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-10 lg:grid-cols-2 lg:gap-12">
                {{-- CMT --}}
                <div class="reveal border-t border-mai-border pt-8" style="--reveal-delay: 0ms">
                    <span class="text-6xl font-black tracking-tight text-mai-red/10" aria-hidden="true">01</span>
                    <p class="mt-5 text-xs font-bold uppercase tracking-widest text-mai-red">Jasa CMT</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-mai-charcoal">Cut, Make, Trim</h3>
                    <p class="mt-4 max-w-md text-sm leading-relaxed text-mai-slate">
                        Kami mengerjakan proses potong, jahit, dan perapihan. Material ditentukan dan disediakan oleh konsumen.
                    </p>
                    <ul class="mt-7 border-t border-mai-border/60 pt-6 text-sm">
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Pemotongan bahan sesuai pola</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Penjahitan oleh tim produksi</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Perapihan detail produk</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-border" aria-hidden="true"></span>
                            <span class="text-mai-slate">Material sepenuhnya dari konsumen</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin bertanya mengenai layanan Jasa CMT.'">
                            Tanya Jasa CMT
                        </x-whatsapp-button>
                    </div>
                </div>

                {{-- FOB --}}
                <div class="reveal border-t-2 border-mai-red bg-mai-ivory p-8 pt-7 sm:p-10" style="--reveal-delay: 90ms">
                    <span class="text-6xl font-black tracking-tight text-mai-red/10" aria-hidden="true">02</span>
                    <p class="mt-5 text-xs font-bold uppercase tracking-widest text-mai-red">Jasa FOB</p>
                    <h3 class="mt-2 text-2xl font-extrabold text-mai-charcoal">Free on Board</h3>
                    <p class="mt-4 max-w-md text-sm leading-relaxed text-mai-slate">
                        Paket lengkap — dari penyediaan material hingga jasa penjahitan sampai produk selesai.
                    </p>
                    <ul class="mt-7 border-t border-mai-border/60 pt-6 text-sm">
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Penyediaan material</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Proses pemotongan &amp; penjahitan</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Produk jadi sampai selesai &amp; rapi</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Lebih praktis untuk satu pintu produksi</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin bertanya mengenai layanan Jasa FOB.'">
                            Tanya Jasa FOB
                        </x-whatsapp-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Production workflow — 8-step verified process. Anchor target for /manufacturing redirect. --}}
    <section id="proses-produksi" class="scroll-mt-24 bg-mai-ivory py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Proses Produksi" align="center" class="reveal mx-auto">
                Dari brief hingga produk sampai di tangan Anda
            </x-section-heading>

            <div class="mt-14">
                <x-process-flow :steps="config('company.process_steps')" />
            </div>

            <div class="reveal mx-auto mt-4 flex max-w-xl items-center justify-center gap-2 rounded-full border border-mai-border bg-white px-5 py-2.5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4 shrink-0 text-mai-red" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <p class="text-xs font-semibold text-mai-charcoal">Quality Control diterapkan pada setiap tahap — dari desain hingga pengiriman.</p>
            </div>
        </div>
    </section>

    {{-- 4. Quality control — charcoal statement band + verified QC scope checklist. --}}
    <section class="bg-mai-charcoal py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
                <div>
                    <h2 class="reveal text-3xl font-extrabold leading-tight text-white sm:text-4xl">
                        Quality Control di setiap tahap produksi
                    </h2>
                    <p class="reveal mt-5 max-w-xl text-base leading-relaxed text-white/60" style="--reveal-delay: 60ms">
                        Jaminan kualitas kami mencakup serangkaian standar yang diawasi sejak tahap desain hingga pengiriman, agar hasil setiap pesanan konsisten.
                    </p>
                    <div class="reveal mt-8" style="--reveal-delay: 120ms">
                        <x-whatsapp-button
                            size="md"
                            :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
                        >
                            Konsultasi Kebutuhan Produksi
                        </x-whatsapp-button>
                    </div>
                </div>

                <div class="reveal border-t border-white/15" style="--reveal-delay: 100ms">
                    @foreach(['Desain', 'Pemilihan Bahan', 'Penjahitan & Perapihan', 'Pengemasan', 'Pengiriman'] as $i => $stage)
                        <div class="flex items-center gap-5 border-b border-white/10 py-4">
                            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-mai-red/20 text-mai-soft-red">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </span>
                            <div class="flex flex-1 items-baseline justify-between gap-4">
                                <span class="text-sm font-bold text-white">{{ $stage }}</span>
                                <span class="text-xs font-black text-white/40" aria-hidden="true">{{ sprintf('%02d', $i + 1) }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Capacity / capability proof — verified metrics from Company Profile & live sources. --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5">
                    <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                        Kapasitas produksi untuk skala besar
                    </h2>
                    <p class="reveal mt-5 max-w-md text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                        Infrastruktur yang mumpuni untuk memenuhi pesanan dalam jumlah besar — dengan pengiriman tepat waktu dan kualitas yang konsisten.
                    </p>
                    <div class="reveal mt-8 flex items-center gap-4" style="--reveal-delay: 120ms">
                        <span class="flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-mai-red/10 text-mai-red">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-sm font-bold text-mai-charcoal">ISO 9001:2015</p>
                            <p class="text-xs text-mai-slate">Sistem manajemen mutu tersertifikasi</p>
                        </div>
                    </div>
                </div>

                @php
                    $capacityStats = [
                        ['value' => config('company.stats.production_capacity', '5.000 pcs/hari'), 'label' => 'Kapasitas Produksi'],
                        ['value' => config('company.stats.employees', '600+'), 'label' => 'Karyawan'],
                        ['value' => config('company.stats.happy_clients', '100+'), 'label' => 'Klien yang Terlayani'],
                        ['value' => config('company.stats.countries_served', '4+'), 'label' => 'Negara Dilayani'],
                    ];
                @endphp
                <div class="lg:col-span-7 grid grid-cols-1 gap-px overflow-hidden rounded-xl border border-mai-border bg-mai-border sm:grid-cols-2">
                    @foreach($capacityStats as $i => $stat)
                        <div class="reveal bg-white p-8" style="--reveal-delay: {{ $i * 60 }}ms">
                            <p class="text-4xl font-black tracking-tight text-mai-charcoal sm:text-5xl" data-counter>{{ $stat['value'] }}</p>
                            <p class="mt-2 text-xs font-medium uppercase tracking-wider text-mai-slate">{{ $stat['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            <p class="reveal mt-8 max-w-3xl text-xs leading-relaxed text-mai-slate" style="--reveal-delay: 80ms">
                Kami beroperasi dari dua lokasi — kantor pusat &amp; fasilitas produksi di Bintaro serta pabrik garmen di Sukabumi (luas bangunan 1.860 m², didirikan 2020).
            </p>
        </div>
    </section>

    {{-- 6. Production facilities — real locations only. --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Beroperasi dari dua lokasi
                </h2>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="reveal" style="--reveal-delay: 0ms">
                    <x-location-card :location="collect(config('company.locations'))->firstWhere('key', 'hq')" variant="compact">
                        Termasuk fasilitas produksi &amp; warehouse — gedung 4 lantai sejak 2023.
                    </x-location-card>
                </div>
                <div class="reveal" style="--reveal-delay: 100ms">
                    <x-location-card :location="collect(config('company.locations'))->firstWhere('key', 'factory')" variant="compact">
                        Luas bangunan 1.860 m² (didirikan 2020).
                    </x-location-card>
                </div>
            </div>

            <p class="reveal mx-auto mt-8 max-w-2xl text-center text-xs text-mai-slate">
                [CONTENT NEEDED — kapabilitas mesin dan jumlah lini produksi spesifik masih menunggu konfirmasi resmi. Lihat docs/CONTENT_REQUIREMENTS.md.]
            </p>
        </div>
    </section>

    <x-cta-section
        heading="Konsultasikan Kebutuhan Produksi Anda"
        description="Diskusikan model kerja sama, lead time, dan spesifikasi produk dengan tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai proses dan kebutuhan produksi garment.'"
    />

</x-layouts.app>
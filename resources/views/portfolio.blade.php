<x-layouts.app title="Portofolio" description="PT Multi Andria Indonesia — contoh hasil produksi untuk brand, komunitas, sekolah, institusi, dan pemerintahan. Konsultasi kebutuhan produksi langsung via WhatsApp.">

    {{-- 1. Hero — showcase positioning. Uses the owner-assigned production
         facility background (same asset as the Layanan hero, treated here
         with a different crop). Decorative image — headline carries the message. --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <img
            src="{{ asset('images/factory/a-factory-with-lots-of.jpg') }}"
            alt=""
            role="presentation"
            class="absolute inset-0 h-full w-full object-cover object-[70%_center]"
            width="1024"
            height="664"
            fetchpriority="high"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-mai-charcoal/95 via-mai-charcoal/75 to-mai-charcoal/30"></div>
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-mai-charcoal to-transparent"></div>

        <div class="relative mx-auto flex min-h-[82vh] max-w-7xl items-center px-4 pt-32 pb-20 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Portofolio</p>
                <h1 class="animate-fade-up mt-5 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl" style="--reveal-delay: 80ms">
                    Produk yang kami produksi, dari kebutuhan hingga hasil nyata
                </h1>
                <p class="animate-fade-up mt-6 max-w-xl text-lg leading-relaxed text-white/80" style="--reveal-delay: 160ms">
                    Kaos, seragam, jaket, hingga tote bag — beserta contoh hasil kerja untuk bisnis, komunitas, dan institusi.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi produk.'">
                        Konsultasi via WhatsApp
                    </x-whatsapp-button>
                    <a href="#portofolio" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/35 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        Lihat Karya
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Portfolio — curated work from _portfolio.json.
         Desktop: hover reveals description overlay on image.
         Tablet/Mobile: description always visible below card. --}}
    <section id="portofolio" class="scroll-mt-24 bg-mai-gray py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Karya &amp; produk pilihan
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                    Pilihan hasil produksi untuk brand, komunitas, dan institusi — setiap produk dapat disesuaikan spesifikasi dan jumlah pesanan.
                </p>
            </div>

            <x-carousel-grid
                id="portofolio"
                label="Karya dan produk pilihan"
                :items="$portfolio"
                card-component="portfolio-card"
            />
        </div>
    </section>

    {{-- 3. Featured showcase — leading _products.json project (Seragam Dinas
         Polri Lengkap). Product/project showcase visual, NOT manufacturing
         process proof. Verified copy only; no client details invented. --}}
    @if($featured = $products->first())
        <section class="bg-mai-white py-16 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 lg:px-8">
                <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:items-center lg:gap-16">
                    <div class="reveal lg:col-span-7">
                        <div class="aspect-[3/4] overflow-hidden bg-mai-gray sm:aspect-[4/5] lg:aspect-[4/3]">
                            @if($featured['image_url'])
                                <img
                                    src="{{ $featured['image_url'] }}"
                                    alt="{{ $featured['title'] }}"
                                    width="1024"
                                    height="1365"
                                    class="h-full w-full object-cover"
                                    loading="lazy"
                                    decoding="async"
                                >
                            @endif
                        </div>
                    </div>
                    <div class="reveal lg:col-span-5" style="--reveal-delay: 100ms">
                        <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Contoh Hasil Produksi</p>
                        <h2 class="mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                            Seragam Dinas Polri Lengkap
                        </h2>
                        <p class="mt-2 text-base font-bold text-mai-slate">PDL Kepolisian</p>
                        <p class="mt-5 max-w-xl text-base leading-relaxed text-mai-slate">
                            {{ $featured['description'] ?? '' }}
                        </p>
                        <ul class="mt-8 border-t border-mai-border/60 pt-6 text-sm max-w-md">
                            <li class="flex gap-3 py-2.5">
                                <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                                <span class="text-mai-charcoal">Atasan abu-abu dengan celana dinas hitam yang fungsional</span>
                            </li>
                            <li class="flex gap-3 py-2.5">
                                <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                                <span class="text-mai-charcoal">Desain resmi untuk kebutuhan dinas, operasional, dan institusi</span>
                            </li>
                            <li class="flex gap-3 py-2.5">
                                <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                                <span class="text-mai-charcoal">Diproduksi dengan quality control di setiap tahap, model CMT atau FOB</span>
                            </li>
                        </ul>
                        <div class="mt-9 flex flex-wrap gap-4">
                            <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin hasil produksi seragam seperti contoh Seragam Dinas Polri di portofolio Anda. Saya ingin berkonsultasi mengenai kebutuhan produksi saya.'">
                                Ingin Hasil Serupa?
                            </x-whatsapp-button>
                            <a href="#produk" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-base font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-charcoal motion-reduce:hover:translate-y-0">
                                Lihat Katalog Produk
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- 4. Product showcase — remaining items from _products.json. Anchor
         target for the legacy /produk redirect. Uniform 3:4 portrait cards
         with product-specific WhatsApp inquiry per tile. --}}
    <section id="produk" class="scroll-mt-24 bg-mai-ivory py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Katalog produk
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                    Produk lain yang pernah kami produksi untuk berbagai kebutuhan — tanya harga dan minimum order langsung via WhatsApp.
                </p>
            </div>

            @if($products->isNotEmpty())
                <x-carousel-grid
                    id="produk"
                    label="Katalog produk"
                    :items="$products"
                    card-component="product-card"
                />
            @else
                <p class="mt-16 text-center text-sm text-mai-slate">Katalog produk sedang dilengkapi.</p>
            @endif

            <div class="mt-16 flex flex-col items-center gap-4 border-t border-mai-border pt-12 text-center">
                <p class="max-w-xl text-sm leading-relaxed text-mai-slate">
                    Tidak menemukan yang Anda butuhkan? Sebutkan spesifikasinya — tim kami akan membantu menyesuaikan produk.
                </p>
                <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi produk.'">
                    Konsultasikan Kebutuhan Anda
                </x-whatsapp-button>
            </div>
        </div>
    </section>

    {{-- 5. Production context — what can be produced, pointed at the services flow. --}}
    <section class="bg-mai-charcoal py-16 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
                <div>
                    <h2 class="reveal text-3xl font-extrabold leading-tight text-white sm:text-4xl">
                        Dari potong, jahit, hingga pengiriman
                    </h2>
                    <p class="reveal mt-5 max-w-xl text-base leading-relaxed text-white/60" style="--reveal-delay: 60ms">
                        Seluruh proses produksi didukung Quality Control di setiap tahap — dari desain hingga produk sampai di tangan Anda.
                    </p>
                    <div class="reveal mt-8" style="--reveal-delay: 120ms">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'">
                            Konsultasi Kebutuhan Produksi
                        </x-whatsapp-button>
                    </div>
                </div>

                <div class="reveal space-y-6" style="--reveal-delay: 100ms">
                    <a href="{{ route('services') }}" class="group flex items-center justify-between gap-6 border-b border-white/10 pb-6 transition-colors duration-200 hover:border-mai-red">
                        <div>
                            <p class="text-sm font-bold text-white">Model Kerja Sama</p>
                            <p class="mt-1 text-xs text-white/50">Jasa CMT &amp; Jasa FOB — sesuai kebutuhan Anda</p>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-mai-soft-red transition-transform duration-200 group-hover:translate-x-1">Layanan</span>
                    </a>
                    <a href="{{ route('services').'#proses-produksi' }}" class="group flex items-center justify-between gap-6 border-b border-white/10 pb-6 transition-colors duration-200 hover:border-mai-red">
                        <div>
                            <p class="text-sm font-bold text-white">Proses Produksi</p>
                            <p class="mt-1 text-xs text-white/50">8 tahap, diamati quality control</p>
                        </div>
                        <span class="text-xs font-bold uppercase tracking-widest text-mai-soft-red transition-transform duration-200 group-hover:translate-x-1">Layanan</span>
                    </a>
                    <p class="pt-2 text-xs leading-relaxed text-white/40">
                        [CONTENT NEEDED — detail kapabilitas mesin dan lini produksi spesifik menunggu konfirmasi resmi. Lihat docs/CONTENT_REQUIREMENTS.md.]
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- 6. Final CTA --}}
    <x-cta-section
        variant="wine"
        eyebrow=""
        heading="Buat Produk Serupa?"
        description="Diskusikan kategori produk, spesifikasi, dan jumlah pesanan bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin produksi produk serupa dengan portofolio Anda. Saya ingin berkonsultasi mengenai kebutuhan produksi saya.'"
        secondary-label="Lihat Layanan"
        secondary-url="{{ route('services') }}"
    />

</x-layouts.app>

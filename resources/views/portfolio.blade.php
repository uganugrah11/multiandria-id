<x-layouts.app title="Portofolio" description="PT Multi Andria Indonesia — katalog kategori produk yang kami produksi untuk brand, komunitas, institusi, dan pemerintahan. Konsultasi kebutuhan produksi langsung via WhatsApp.">

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
                    Produk yang kami produksi, dari kategori hingga hasil nyata
                </h1>
                <p class="animate-fade-up mt-6 max-w-xl text-lg leading-relaxed text-white/80" style="--reveal-delay: 160ms">
                    10 kategori produksi utama — dari kaos, jaket, hingga tote bag — beserta contoh hasil kerja untuk bisnis, komunitas, dan institusi.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi produk.'">
                        Konsultasi via WhatsApp
                    </x-whatsapp-button>
                    <a href="#produk" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/35 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        Lihat Katalog Produk
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Product categories — visual category index backed by product imagery. --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Sepuluh kategori produksi utama
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                    Setiap kategori dapat disesuaikan spesifikasi, bahan, dan jumlah pesanan sesuai kebutuhan Anda.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-5">
                @foreach($productTypes as $slug => $label)
                    @php
                        $product = $categoryProducts->get($slug);
                        $hasImage = $product && $product->primary_image_url && ! str_contains($product->primary_image_url, 'placeholder-product.svg');
                    @endphp
                    <a
                        href="{{ route('portfolio', ['type' => $slug]).'#produk' }}"
                        class="reveal group relative block overflow-hidden bg-mai-ivory"
                        style="--reveal-delay: {{ min($loop->index * 50, 350) }}ms"
                    >
                        @if($hasImage)
                            <img
                                src="{{ $product->primary_image_url }}"
                                alt=""
                                class="aspect-[3/4] w-full object-cover opacity-80 transition-all duration-500 ease-out group-hover:scale-105 group-hover:opacity-100"
                                loading="lazy"
                                width="1024"
                                height="1024"
                            >
                        @else
                            <div class="aspect-[3/4] w-full bg-mai-ivory"></div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-mai-charcoal/90 via-mai-charcoal/50 to-transparent p-4 pt-12">
                            <p class="text-xs font-black text-mai-soft-red" aria-hidden="true">{{ sprintf('%02d', $loop->iteration) }}</p>
                            <p class="mt-1 text-sm font-bold text-white">{{ $label }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 3. Featured showcase — Asset A: custom black T-shirt.
         Product/project showcase visual, NOT manufacturing-process proof.
         Verified copy only; no client details invented. --}}
    <section class="bg-mai-ivory py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2 lg:items-center lg:gap-16">
                <div class="reveal">
                    <img
                        src="{{ asset('images/produk/a-black-shirt-with-the.jpg') }}"
                        alt="Kaos hitam custom dengan branding"
                        class="aspect-square w-full object-cover"
                        width="1080"
                        height="1080"
                        loading="lazy"
                    >
                </div>
                <div class="reveal" style="--reveal-delay: 100ms">
                    <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Contoh Hasil Produksi</p>
                    <h2 class="mt-3 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                        Kaos hitam custom dengan branding
                    </h2>
                    <p class="mt-5 max-w-xl text-base leading-relaxed text-mai-slate">
                        Kaos merupakan salah satu kategori yang paling sering kami produksi — untuk brand, komunitas, sekolah, hingga kebutuhan korporat dan pemerintahan.
                    </p>
                    <ul class="mt-8 border-t border-mai-border/60 pt-6 text-sm max-w-md">
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Desain branding / logo dapat disesuaikan</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Bahan dan ukuran dikonsultasikan sesuai kebutuhan</span>
                        </li>
                        <li class="flex gap-3 py-2.5">
                            <span class="mt-1 h-1.5 w-1.5 shrink-0 rounded-full bg-mai-red" aria-hidden="true"></span>
                            <span class="text-mai-charcoal">Dapat dikerjakan melalui model kerja sama CMT atau FOB</span>
                        </li>
                    </ul>
                    <div class="mt-8">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin hasil produksi kaos seperti contoh di portofolio Anda. Saya ingin berkonsultasi mengenai kebutuhan produksi saya.'">
                            Ingin Hasil Serupa?
                        </x-whatsapp-button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 4. Product showcase — filterable katalog produk. Anchor target for /produk redirect. --}}
    <section id="produk" class="scroll-mt-24 bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <h2 class="reveal text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl">
                    Katalog produk per kategori
                </h2>
                <p class="reveal mt-4 max-w-xl text-base leading-relaxed text-mai-slate" style="--reveal-delay: 60ms">
                    Pilih kategori untuk melihat contoh produk yang kami produksi.
                </p>
            </div>

            <div class="mt-10 flex flex-wrap gap-2" aria-label="Filter produk">
                <a href="{{ route('portfolio').'#produk' }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') ? 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' : 'border-mai-red bg-mai-red text-white' }}" {{ request('type') ? '' : 'aria-current="page"' }}>
                    Semua
                </a>
                @foreach($productTypes as $slug => $label)
                    <a href="{{ route('portfolio', ['type' => $slug]).'#produk' }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') === $slug ? 'border-mai-red bg-mai-red text-white' : 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' }}" {{ request('type') === $slug ? 'aria-current="page"' : '' }}>
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            @if($products->isEmpty())
                <p class="mt-16 text-center text-sm text-mai-slate">Belum ada produk pada kategori ini.</p>
            @else
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($products as $product)
                        <div class="reveal group overflow-hidden rounded-xl border border-mai-border bg-white transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md" style="--reveal-delay: {{ min($loop->index * 60, 360) }}ms">
                            <div class="aspect-square overflow-hidden bg-mai-ivory">
                                <img
                                    src="{{ $product->primary_image_url }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                    loading="lazy"
                                    width="1024"
                                    height="1024"
                                >
                            </div>
                            <div class="p-5">
                                <p class="text-xs font-semibold uppercase tracking-wide text-mai-red">{{ $product->product_type_name }}</p>
                                <h3 class="mt-1 text-base font-bold text-mai-charcoal">{{ $product->name }}</h3>
                                @if($product->description)
                                    <p class="mt-2 line-clamp-2 text-sm text-mai-slate">{{ $product->description }}</p>
                                @endif
                                @if($product->moq)
                                    <p class="mt-2 text-xs text-mai-slate">MOQ {{ $product->moq }} pcs</p>
                                @endif
                                <div class="mt-4">
                                    <x-whatsapp-button
                                        size="md"
                                        class="w-full"
                                        :message="'Halo Multi Andria Indonesia, saya tertarik dengan produk '.$product->name.'. Saya ingin mendapatkan informasi mengenai harga dan minimum order.'"
                                    >
                                        Tanya via WhatsApp
                                    </x-whatsapp-button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <p class="mt-12 text-center text-xs text-mai-slate">
                [CONTENT NEEDED — jumlah SKU per kategori masih terbatas menunggu tambahan contoh produk dari bisnis. Foto proyek nyata juga ditambahkan setelah tersedia. Lihat docs/CONTENT_REQUIREMENTS.md.]
            </p>
        </div>
    </section>

    {{-- 5. Production context — what we can produce, pointed at the services flow. --}}
    <section class="bg-mai-charcoal py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
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
        heading="Buat Produk Serupa?"
        description="Diskusikan kategori produk, spesifikasi, dan jumlah pesanan bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin produksi produk serupa dengan portofolio Anda. Saya ingin berkonsultasi mengenai kebutuhan produksi saya.'"
        secondary-label="Lihat Layanan"
        secondary-url="{{ route('services') }}"
    />

</x-layouts.app>
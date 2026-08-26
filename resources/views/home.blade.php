<x-layouts.app>

    {{-- 1. Hero --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 py-20 sm:px-6 lg:grid-cols-2 lg:px-8 lg:py-32">
            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">PT. Multi Andria Indonesia</p>
                <h1 class="mt-4 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl">
                    Partner Produksi Garment untuk Bisnis dan Institusi Anda
                </h1>
                <p class="mt-6 max-w-lg text-lg leading-relaxed text-white/70">
                    Produksi garment dan tekstil custom untuk kebutuhan brand, perusahaan, sekolah, dan pemerintahan — dari konsultasi sampai produksi selesai.
                </p>
                <div class="mt-10 flex flex-wrap gap-4">
                    <x-whatsapp-button size="lg">Konsultasi via WhatsApp</x-whatsapp-button>
                    <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/30 px-8 py-4 text-base font-semibold text-white transition-colors hover:border-white">
                        Lihat Produk
                    </a>
                </div>
            </div>

            <div class="relative aspect-4/5 overflow-hidden rounded-2xl border border-white/10 bg-white/5 lg:aspect-square">
                <div class="flex h-full items-center justify-center p-10 text-center text-sm text-white/40">
                    [CONTENT NEEDED — foto produksi/factory asli PT. Multi Andria Indonesia akan tampil di sini]
                </div>
            </div>
        </div>
    </section>

    {{-- 2. Company Introduction --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div>
                <x-section-heading eyebrow="Sejak 2012">
                    Dari konveksi kecil di Bintaro, kini melayani bisnis dan institusi di seluruh Indonesia
                </x-section-heading>
                <p class="mt-6 max-w-lg text-base leading-relaxed text-mai-slate">
                    PT. Multi Andria Indonesia berdiri sejak 2012 dan resmi berbadan hukum pada 2018. Kini kami mengoperasikan kantor pusat di Bintaro dan pabrik produksi di Sukabumi, melayani klien B2B maupun B2G/BUMN.
                </p>
                <a href="{{ route('about') }}" class="mt-6 inline-flex items-center gap-1 text-sm font-semibold text-mai-red hover:text-mai-wine">
                    Selengkapnya tentang kami &rarr;
                </a>
            </div>
            <div class="rounded-2xl border border-mai-border bg-mai-ivory p-8">
                <x-company-timeline />
            </div>
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
            <x-section-heading eyebrow="Kapabilitas Produk" align="center" class="mx-auto">
                Kami memproduksi berbagai kategori garment
            </x-section-heading>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-3 lg:grid-cols-5">
                @foreach(\App\Models\Product::productTypes() as $slug => $label)
                    <a href="{{ route('products.index', ['type' => $slug]) }}" class="group rounded-xl border border-mai-border bg-white p-6 text-center transition hover:border-mai-red">
                        <p class="text-sm font-bold text-mai-charcoal group-hover:text-mai-red">{{ $label }}</p>
                    </a>
                @endforeach
            </div>

            <div class="mt-10 text-center">
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-mai-border px-8 py-4 text-sm font-semibold text-mai-charcoal transition hover:border-mai-charcoal">
                    Lihat Semua Produk
                </a>
            </div>
        </div>
    </section>

    {{-- 5. Manufacturing Capabilities --}}
    <section class="bg-mai-charcoal py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Kapabilitas Produksi" align="center" class="mx-auto">
                <span class="text-white">Dari konsultasi sampai produk jadi</span>
            </x-section-heading>

            <div class="mt-12 grid grid-cols-2 gap-4 sm:grid-cols-4">
                @foreach(['Konsultasi', 'Cutting', 'Sewing', 'Finishing & QC'] as $step)
                    <div class="rounded-xl border border-white/10 bg-white/5 p-6 text-center">
                        <p class="text-sm font-bold text-white">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mx-auto mt-8 max-w-2xl text-center text-sm text-white/50">
                [CONTENT NEEDED — konfirmasi tahapan produksi lengkap dan kapabilitas CMT/FOB sebelum tampil sebagai klaim final. Lihat docs/CONTENT_REQUIREMENTS.md.]
            </p>

            <div class="mt-10 text-center">
                <x-whatsapp-button
                    size="lg"
                    :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
                >
                    Konsultasikan Kebutuhan Produksi
                </x-whatsapp-button>
            </div>
        </div>
    </section>

    {{-- 6. Why Multi Andria --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Mengapa Multi Andria" align="center" class="mx-auto">
                Dipercaya bisnis dan institusi di seluruh Indonesia
            </x-section-heading>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['title' => 'Kapasitas Produksi Besar', 'desc' => 'Kapasitas produksi hingga 5.000 pcs per hari.'],
                    ['title' => 'Produksi Custom', 'desc' => 'Desain, ukuran, dan bahan disesuaikan kebutuhan Anda.'],
                    ['title' => 'Berpengalaman B2G', 'desc' => 'Menangani proyek pemerintahan dan BUMN.'],
                    ['title' => 'Tim Profesional', 'desc' => '600+ karyawan mendukung proses produksi.'],
                ] as $item)
                    <div class="rounded-xl border border-mai-border p-6">
                        <div class="mb-4 h-10 w-10 rounded-full bg-mai-red/10"></div>
                        <h3 class="text-base font-bold text-mai-charcoal">{{ $item['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- 7. Portfolio (preview) --}}
    @if($featuredPortfolio->isNotEmpty())
        <section class="bg-mai-ivory py-20 sm:py-24">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <x-section-heading eyebrow="Portfolio">Hasil produksi kami</x-section-heading>

                <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach($featuredPortfolio as $project)
                        <div class="overflow-hidden rounded-xl border border-mai-border bg-white">
                            <div class="aspect-square bg-mai-gray">
                                @if($project->cover_image_url)
                                    <img src="{{ $project->cover_image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
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

                <div class="mt-10 text-center">
                    <x-whatsapp-button variant="secondary" size="md">Buat Produk Serupa</x-whatsapp-button>
                </div>
            </div>
        </section>
    @endif

    {{-- 8. Client / Trust Signals --}}
    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Klien Kami" align="center" class="mx-auto">
                Dipercaya oleh brand dan institusi terkemuka
            </x-section-heading>
            <div class="mt-12">
                <x-client-logos />
            </div>
        </div>
    </section>

    {{-- 9. FAQ --}}
    <section class="bg-mai-ivory py-20 sm:py-24" x-data="{ open: 0 }">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="FAQ" align="center" class="mx-auto">
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
                    <div class="overflow-hidden rounded-xl border border-mai-border bg-white">
                        <button
                            @click="open = open === {{ $index }} ? null : {{ $index }}"
                            class="flex w-full items-center justify-between gap-4 px-6 py-5 text-left"
                        >
                            <span class="text-sm font-bold text-mai-charcoal">{{ $faq['q'] }}</span>
                            <span class="text-mai-red" x-text="open === {{ $index }} ? '−' : '+'"></span>
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
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Siap Memulai Produksi?</h2>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/80">
                Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/{{ config('company.whatsapp.number') }}?text={{ rawurlencode(config('company.whatsapp.default_message')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-8 py-4 text-base font-semibold text-mai-red hover:bg-mai-ivory">
                    Konsultasi via WhatsApp
                </a>
                <a href="{{ route('products.index') }}" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/40 px-8 py-4 text-base font-semibold text-white hover:border-white">
                    Lihat Produk
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

<x-layouts.app title="Manufacturing">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Manufacturing</p>
            <h1 class="animate-fade-up mt-4 text-3xl font-extrabold text-white sm:text-4xl" style="--reveal-delay: 80ms">Kapabilitas Produksi Kami</h1>
        </div>
    </section>

    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    {{-- Production Process --}}
    <section class="bg-mai-ivory py-16 sm:py-20">
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

    {{-- Production Facilities --}}
    <section class="bg-white py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Fasilitas Produksi" align="center" class="reveal mx-auto">
                Beroperasi dari dua lokasi
            </x-section-heading>

            <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="reveal" style="--reveal-delay: 0ms">
                    <x-location-card :location="collect(config('company.locations'))->firstWhere('key', 'hq')" variant="compact">
                        Termasuk fasilitas produksi & warehouse — gedung 4 lantai sejak 2023.
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

    <section class="bg-mai-red py-16 sm:py-20">
        <div class="reveal mx-auto max-w-2xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-2xl font-extrabold text-white sm:text-3xl">Konsultasikan Kebutuhan Produksi Anda</h2>
            <div class="mt-8">
                <x-whatsapp-button
                    size="lg"
                    class="bg-white! text-mai-red! hover:bg-mai-ivory!"
                    :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai proses dan kebutuhan produksi garment.'"
                >
                    Konsultasi via WhatsApp
                </x-whatsapp-button>
            </div>
        </div>
    </section>

</x-layouts.app>

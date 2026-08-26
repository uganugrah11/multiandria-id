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

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
                <div class="reveal" style="--reveal-delay: 0ms">
                    <x-location-card :location="collect(config('company.locations'))->firstWhere('key', 'hq')" variant="compact" />
                </div>
                <div class="reveal" style="--reveal-delay: 100ms">
                    <x-location-card :location="collect(config('company.locations'))->firstWhere('key', 'factory')" variant="compact">
                        Luas bangunan 1.860 m² (didirikan 2020).
                    </x-location-card>
                </div>
            </div>

            <div class="reveal mt-8 rounded-2xl border border-mai-border bg-white p-8">
                <h2 class="text-center text-lg font-bold text-mai-charcoal">Proses Produksi</h2>
                <div class="mt-6 grid grid-cols-2 gap-4 sm:grid-cols-5">
                    @foreach(['Desain', 'Pemilihan Bahan', 'Penjahitan & Perapihan', 'Pengemasan', 'Pengiriman'] as $step)
                        <div class="rounded-lg border border-mai-border bg-mai-ivory p-4 text-center">
                            <p class="text-xs font-bold text-mai-charcoal sm:text-sm">{{ $step }}</p>
                        </div>
                    @endforeach
                </div>
                <p class="mt-6 text-center text-sm leading-relaxed text-mai-slate">
                    Quality Control kami komprehensif di setiap tahap. Kapabilitas mesin dan jumlah lini produksi spesifik masih menunggu konfirmasi resmi.
                </p>
                <p class="mt-2 text-center text-xs font-semibold uppercase tracking-wide text-mai-red">
                    [CONTENT NEEDED — lihat docs/CONTENT_REQUIREMENTS.md]
                </p>
            </div>

            <div class="reveal mt-10 text-center">
                <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'">
                    Konsultasikan Kebutuhan Produksi
                </x-whatsapp-button>
            </div>
        </div>
    </section>

</x-layouts.app>

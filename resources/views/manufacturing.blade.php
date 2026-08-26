<x-layouts.app title="Manufacturing">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">Manufacturing</p>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">Kapabilitas Produksi Kami</h1>
        </div>
    </section>

    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-2">
                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-lg font-bold text-mai-charcoal">Kantor Pusat — Bintaro</h2>
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ config('company.address.hq') }}</p>
                </div>
                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-lg font-bold text-mai-charcoal">Pabrik Produksi — Sukabumi</h2>
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ config('company.address.factory') }}</p>
                    <p class="mt-2 text-xs text-mai-slate">Luas bangunan 1.860 m² (didirikan 2020).</p>
                </div>
            </div>

            <div class="mt-8 rounded-2xl border border-mai-border bg-white p-8 text-center">
                <p class="text-sm leading-relaxed text-mai-slate">
                    Tahapan produksi detail (cutting, sewing, printing, embroidery, finishing, QC, packaging) dan kapabilitas mesin sedang menunggu konfirmasi resmi dari tim Multi Andria Indonesia sebelum ditampilkan sebagai klaim publik.
                </p>
                <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-mai-red">
                    [CONTENT NEEDED — lihat docs/CONTENT_REQUIREMENTS.md]
                </p>
            </div>

            <div class="mt-10 text-center">
                <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'">
                    Konsultasikan Kebutuhan Produksi
                </x-whatsapp-button>
            </div>
        </div>
    </section>

</x-layouts.app>

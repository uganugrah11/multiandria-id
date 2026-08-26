<x-layouts.app title="Tentang Kami">

    <section class="bg-mai-charcoal py-20 sm:py-28">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">Tentang Kami</p>
            <h1 class="mt-4 text-4xl font-extrabold text-white sm:text-5xl">PT. Multi Andria Indonesia</h1>
            <p class="mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-white/70">
                Produsen garment dan tekstil terkemuka, berdiri sejak 2012, dengan komitmen pada kualitas produksi, standar tinggi, dan lead time yang singkat.
            </p>
        </div>
    </section>

    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-2xl border border-mai-border bg-mai-ivory p-8 text-center sm:p-12">
                <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Visi</p>
                <p class="mx-auto mt-4 max-w-2xl text-xl font-semibold leading-relaxed text-mai-charcoal sm:text-2xl">
                    Menjadi perusahaan garment manufacturing terintegrasi nomor satu di Indonesia yang memberikan pelayanan profesional dan kualitas produk terbaik.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Misi" align="center" class="mx-auto">
                Komitmen kami dalam setiap aspek bisnis
            </x-section-heading>

            <div class="mt-12 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach([
                    'Produk berkualitas tinggi',
                    'Inovasi desain & teknologi',
                    'Pelayanan profesional',
                    'Produksi ramah lingkungan',
                    'Kontribusi pada komunitas & lingkungan',
                    'Keunggulan berkelanjutan',
                ] as $mission)
                    <div class="rounded-xl border border-mai-border bg-white p-6">
                        <p class="text-sm font-bold text-mai-charcoal">{{ $mission }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Perjalanan Kami" align="center" class="mx-auto">
                Company Timeline
            </x-section-heading>
            <div class="mt-12">
                <x-company-timeline />
            </div>
        </div>
    </section>

    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Klien Kami" align="center" class="mx-auto">
                Dipercaya oleh brand dan institusi terkemuka
            </x-section-heading>
            <div class="mt-12">
                <x-client-logos />
            </div>
        </div>
    </section>

    <section class="bg-mai-red py-20">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Siap Bekerja Sama dengan Kami?</h2>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/{{ config('company.whatsapp.number') }}?text={{ rawurlencode(config('company.whatsapp.default_message')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-8 py-4 text-base font-semibold text-mai-red hover:bg-mai-ivory">
                    Konsultasi via WhatsApp
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

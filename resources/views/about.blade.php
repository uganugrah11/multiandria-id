<x-layouts.app title="Tentang Kami">

    <section class="bg-mai-charcoal py-20 sm:py-28">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Tentang Kami</p>
            <h1 class="animate-fade-up mt-4 text-4xl font-extrabold text-white sm:text-5xl" style="--reveal-delay: 80ms">PT. Multi Andria Indonesia</h1>
            <p class="animate-fade-up mx-auto mt-6 max-w-2xl text-lg leading-relaxed text-white/70" style="--reveal-delay: 160ms">
                Produsen garment dan tekstil terkemuka, berdiri sejak 2014, dengan komitmen pada kualitas produksi, standar tinggi, dan lead time yang singkat.
            </p>
            <div class="animate-fade-up mt-8" style="--reveal-delay: 220ms">
                <a
                    href="{{ asset('company_profile.pdf') }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/30 px-6 py-3 text-sm font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/>
                    </svg>
                    Unduh Company Profile (PDF)
                </a>
            </div>
        </div>
    </section>

    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="reveal-scale rounded-2xl border border-mai-border bg-mai-ivory p-8 text-center sm:p-12">
                <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Visi</p>
                <p class="mx-auto mt-4 max-w-2xl text-xl font-semibold leading-relaxed text-mai-charcoal sm:text-2xl">
                    Menjadi perusahaan garment manufacturing terintegrasi nomor satu di Indonesia yang memberikan pelayanan profesional dan kualitas produk terbaik.
                </p>
            </div>
        </div>
    </section>

    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Misi" align="center" class="reveal mx-auto">
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
                    <div class="reveal rounded-xl border border-mai-border bg-white p-6 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md" style="--reveal-delay: {{ $loop->index * 60 }}ms">
                        <p class="text-sm font-bold text-mai-charcoal">{{ $mission }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Perjalanan Kami" align="center" class="reveal mx-auto">
                Company Timeline
            </x-section-heading>
        </div>
        <div class="mx-auto mt-12 max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-company-timeline />
        </div>
    </section>

    <section id="lokasi" class="scroll-mt-24 bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Lokasi Kami" align="center" class="reveal mx-auto">
                Temukan Multi Andria Indonesia
            </x-section-heading>
            <p class="reveal mx-auto mt-4 max-w-xl text-center text-sm text-mai-slate" style="--reveal-delay: 60ms">
                Kantor pusat dan fasilitas produksi kami — kunjungi langsung atau buka rutenya di Google Maps.
            </p>

            <div class="mt-12 space-y-6">
                @foreach(config('company.locations') as $location)
                    <div class="reveal" style="--reveal-delay: {{ $loop->index * 120 }}ms">
                        <x-location-card :location="$location" variant="prominent" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Klien Kami" align="center" class="reveal mx-auto">
                Dipercaya oleh brand dan institusi terkemuka
            </x-section-heading>
            <div class="mt-12">
                <x-client-logos />
            </div>
        </div>
    </section>

    <section class="bg-mai-red py-20">
        <div class="reveal mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">Siap Bekerja Sama dengan Kami?</h2>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="https://wa.me/{{ config('company.whatsapp.number') }}?text={{ rawurlencode(config('company.whatsapp.default_message')) }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg bg-white px-8 py-4 text-base font-semibold text-mai-red shadow-sm transition-all duration-200 hover:-translate-y-0.5 hover:bg-mai-ivory hover:shadow-md motion-reduce:hover:translate-y-0">
                    Konsultasi via WhatsApp
                </a>
            </div>
        </div>
    </section>

</x-layouts.app>

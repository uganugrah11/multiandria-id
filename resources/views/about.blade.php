<x-layouts.app title="Tentang Kami">

    <x-page-hero
        eyebrow="Tentang Kami"
        title="PT. Multi Andria Indonesia"
        :description="config('company.description')"
    >
        <x-slot name="actions">
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
        </x-slot>
    </x-page-hero>

    <section class="bg-mai-wine py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-stat-strip />
        </div>
    </section>

    {{-- Vision & Mission --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <p class="reveal text-center text-xs font-bold uppercase tracking-widest text-mai-red">Arah Kami</p>

            <div class="mt-12 grid grid-cols-1 gap-12 lg:grid-cols-2 lg:gap-16">
                <div class="reveal lg:pr-8">
                    <span class="text-6xl font-black leading-none text-mai-red/15" aria-hidden="true">&ldquo;</span>
                    <p class="-mt-6 text-xs font-bold uppercase tracking-widest text-mai-slate">Visi</p>
                    <p class="mt-4 text-2xl font-bold leading-snug text-mai-charcoal sm:text-3xl">
                        {{ config('company.vision') }}
                    </p>
                </div>

                <div class="relative lg:border-l lg:border-mai-border lg:pl-16">
                    <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-slate">Misi</p>
                    <div class="mt-6 space-y-6">
                        @foreach(config('company.mission') as $mission)
                            <div class="reveal group flex gap-5" style="--reveal-delay: {{ $loop->index * 80 }}ms">
                                <span class="shrink-0 text-2xl font-black text-mai-red/25 transition-colors duration-200 group-hover:text-mai-red">
                                    {{ sprintf('%02d', $loop->iteration) }}
                                </span>
                                <p class="mt-1 text-sm font-medium leading-relaxed text-mai-charcoal sm:text-base">
                                    {{ $mission }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Legalitas & sertifikasi --}}
            <div class="mt-16 grid grid-cols-1 gap-4 border-t border-mai-border pt-10 sm:grid-cols-3">
                @foreach(config('company.certifications') as $cert)
                    <div class="reveal flex items-center gap-3" style="--reveal-delay: {{ $loop->index * 70 }}ms">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-mai-red/10 text-mai-red">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4.5 w-4.5" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </span>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-wide text-mai-slate">{{ $cert['label'] }}</p>
                            <p class="text-sm font-semibold text-mai-charcoal">{{ $cert['value'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Keunggulan Kami --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-section-heading eyebrow="Keunggulan Kami" align="center" class="reveal mx-auto">
                3 poin keunggulan kami dibanding kompetitor
            </x-section-heading>

            <div class="mt-12 grid grid-cols-1 gap-6 lg:grid-cols-3">
                @foreach(config('company.advantages') as $advantage)
                    <div class="reveal rounded-xl border border-mai-border bg-white p-6 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md" style="--reveal-delay: {{ $loop->index * 90 }}ms">
                        <span class="flex h-10 w-10 items-center justify-center rounded-full bg-mai-red/10 text-sm font-black text-mai-red">
                            {{ $loop->iteration }}
                        </span>
                        <h3 class="mt-4 text-base font-bold text-mai-charcoal">{{ $advantage['title'] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ $advantage['description'] }}</p>
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

    <x-cta-section
        heading="Siap Bekerja Sama dengan Kami?"
        description="Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
    />

</x-layouts.app>

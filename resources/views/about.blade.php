<x-layouts.app title="Tentang Kami" description="PT Multi Andria Indonesia — konveksi & distributor bahan tekstil serta produk fashion. Profil perusahaan, skala, visi & misi, sertifikasi, perjalanan, dan lokasi kami.">

    {{-- 1. Hero — full-bleed HQ photograph (company identity, NOT factory proof).
         Assigned by project owner. Decorative image; headline carries the message. --}}
    <section class="relative overflow-hidden bg-mai-charcoal">
        <img
            src="{{ asset('images/factory/a-building-with-a-glass.jpg') }}"
            alt=""
            role="presentation"
            class="absolute inset-0 h-full w-full object-cover"
            width="1080"
            height="650"
            fetchpriority="high"
            decoding="async"
        >
        <div class="absolute inset-0 bg-gradient-to-r from-mai-charcoal/95 via-mai-charcoal/70 to-mai-charcoal/30"></div>
        <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-mai-charcoal to-transparent"></div>

        <div class="relative mx-auto flex min-h-[82vh] max-w-7xl items-center px-4 pt-32 pb-20 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Tentang Kami</p>
                <h1 class="animate-fade-up mt-5 text-4xl font-extrabold leading-[1.05] text-white sm:text-5xl lg:text-6xl" style="--reveal-delay: 80ms">
                    PT Multi Andria Indonesia
                </h1>
                <p class="animate-fade-up mt-6 max-w-xl text-lg leading-relaxed text-white/80" style="--reveal-delay: 160ms">
                    Konveksi &amp; distributor bahan tekstil serta produk fashion untuk bisnis, institusi, dan pemerintahan — berpengalaman sejak 2014.
                </p>
                <div class="animate-fade-up mt-10 flex flex-wrap gap-4" style="--reveal-delay: 240ms">
                    <x-whatsapp-button size="lg" :message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'">Konsultasi via WhatsApp</x-whatsapp-button>
                    <a href="{{ asset('company_profile.pdf') }}" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center gap-2 rounded-lg border border-white/35 px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:border-white motion-reduce:hover:translate-y-0">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-4 w-4" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v12m0 0l-4-4m4 4l4-4M4 20h16"/>
                        </svg>
                        Unduh Company Profile
                    </a>
                </div>
            </div>
        </div>

        <div class="absolute inset-x-0 bottom-0">
            <div class="mx-auto max-w-7xl px-4 pb-6 sm:px-6 lg:px-8">
                <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-mai-charcoal/55 px-4 py-2 text-xs font-medium text-white/80 backdrop-blur-sm">
                    <span class="h-1.5 w-1.5 rounded-full bg-mai-soft-red" aria-hidden="true"></span>
                    Kantor Pusat — {{ collect(config('company.locations'))->firstWhere('key', 'hq')['name'] ?? 'Bintaro' }}
                </span>
            </div>
        </div>
    </section>

    {{-- 2. Company introduction — editorial profile statement, verified copy only. --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-12 lg:gap-16">
                <div class="lg:col-span-5">
                    <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">Profil Perusahaan</p>
                    <h2 class="reveal mt-4 text-3xl font-extrabold leading-tight text-mai-charcoal sm:text-4xl" style="--reveal-delay: 60ms">
                        Partner produksi yang mengutamakan kualitas dan ketepatan waktu
                    </h2>
                </div>
                <div class="lg:col-span-7">
                    <p class="reveal text-base leading-relaxed text-mai-slate sm:text-lg" style="--reveal-delay: 90ms">
                        {{ config('company.description') }}
                    </p>

                    <dl class="reveal mt-10 grid grid-cols-1 gap-x-8 gap-y-6 border-t border-mai-border pt-8 sm:grid-cols-2" style="--reveal-delay: 140ms">
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-mai-slate">Berdiri Sejak</dt>
                            <dd class="mt-1 text-lg font-bold text-mai-charcoal">{{ config('company.stats.years_experience') }} tahun — 2014</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-mai-slate">Perusahaan</dt>
                            <dd class="mt-1 text-lg font-bold text-mai-charcoal">PT Multi Andria Indonesia (PT. MAI)</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-mai-slate">Layanan Pelanggan</dt>
                            <dd class="mt-1 text-lg font-bold text-mai-charcoal">Bisnis, institusi, dan pemerintahan (B2B &amp; B2G)</dd>
                        </div>
                        <div>
                            <dt class="text-xs font-bold uppercase tracking-wider text-mai-slate">Lokasi Operasi</dt>
                            <dd class="mt-1 text-lg font-bold text-mai-charcoal">Bintaro &amp; Sukabumi</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    {{-- 3. Scale / proof metrics — charcoal editorial band, data-counter values. --}}
    <section class="bg-mai-charcoal py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-3 sm:gap-y-16">
                @php
                    $proofStats = [
                        ['value' => config('company.stats.years_experience', '12+'), 'label' => 'Tahun Berpengalaman'],
                        ['value' => config('company.stats.employees', '600+'), 'label' => 'Karyawan'],
                        ['value' => config('company.stats.production_capacity', '5.000 pcs/hari'), 'label' => 'Kapasitas Produksi'],
                        ['value' => config('company.stats.happy_clients', '100+'), 'label' => 'Klien yang Terlayani'],
                        ['value' => config('company.stats.product_categories', '10'), 'label' => 'Kategori Produk'],
                        ['value' => config('company.stats.countries_served', '4+'), 'label' => 'Negara Dilayani'],
                    ];
                @endphp
                @foreach($proofStats as $i => $stat)
                    <div class="reveal {{ $i && $i % 3 !== 0 ? 'sm:border-none' : '' }}" style="--reveal-delay: {{ $i * 70 }}ms">
                        <p class="text-5xl font-black tracking-tight text-white sm:text-6xl" data-counter>{{ $stat['value'] }}</p>
                        <p class="mt-2 text-sm font-medium uppercase tracking-wider text-white/55">{{ $stat['label'] }}</p>
                    </div>
                @endforeach
            </div>
            <p class="mt-14 max-w-2xl text-sm leading-relaxed text-white/55">
                Angka di atas berdasarkan profil perusahaan resmi kami. <a href="{{ asset('company_profile.pdf') }}" target="_blank" rel="noopener noreferrer" class="font-semibold text-mai-soft-red hover:text-white">Unduh Company Profile (PDF)</a> untuk informasi lebih lengkap.
            </p>
        </div>
    </section>

    {{-- 4. Vision & Mission --}}
    <section class="bg-white py-20 sm:py-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-14 lg:grid-cols-2 lg:gap-16">
                <div class="lg:pr-8">
                    <p class="reveal text-6xl font-black leading-none text-mai-red/15" aria-hidden="true">&ldquo;</p>
                    <p class="reveal -mt-4 text-xs font-bold uppercase tracking-widest text-mai-slate" style="--reveal-delay: 40ms">Visi</p>
                    <h2 class="reveal mt-4 text-2xl font-extrabold leading-snug text-mai-charcoal sm:text-3xl" style="--reveal-delay: 80ms">
                        {{ config('company.vision') }}
                    </h2>
                </div>

                <div class="lg:border-l lg:border-mai-border lg:pl-16">
                    <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-slate">Misi</p>
                    <div class="reveal mt-6 divide-y divide-mai-border border-t border-mai-border" style="--reveal-delay: 60ms">
                        @foreach(config('company.mission') as $mission)
                            <p class="flex gap-5 py-4">
                                <span class="shrink-0 text-sm font-black text-mai-red/40">{{ sprintf('%02d', $loop->iteration) }}</span>
                                <span class="text-sm font-medium leading-relaxed text-mai-charcoal sm:text-base">{{ $mission }}</span>
                            </p>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Sertifikat & legalitas --}}
            <div class="mt-16 border-t border-mai-border pt-10">
                <p class="reveal text-xs font-bold uppercase tracking-widest text-mai-red">Sertifikat &amp; Legalitas</p>
                <div class="reveal mt-6 grid grid-cols-1 gap-6 sm:grid-cols-3" style="--reveal-delay: 60ms">
                    @foreach(config('company.certifications') as $cert)
                        <div class="flex items-center gap-4">
                            <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-full bg-mai-red/10 text-mai-red">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="text-xs font-bold uppercase tracking-wide text-mai-slate">{{ $cert['label'] }}</p>
                                <p class="mt-0.5 text-sm font-semibold text-mai-charcoal">{{ $cert['value'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- 5. Company timeline --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-3xl px-4 text-center sm:px-6 lg:px-8">
            <x-section-heading align="center" class="reveal mx-auto">
                Perjalanan Perusahaan
            </x-section-heading>
            <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-mai-slate">
                Dari konveksi di Bintaro menjadi perusahaan garmen dengan fasilitas produksi di dua lokasi.
            </p>
        </div>
        <div class="mx-auto mt-14 max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-company-timeline />
        </div>
    </section>

    {{-- 6. Locations --}}
    <section id="lokasi" class="scroll-mt-24 bg-white py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <x-section-heading align="center" class="reveal mx-auto">
                    Kantor &amp; Fasilitas Kami
                </x-section-heading>
                <p class="mx-auto mt-4 max-w-xl text-sm leading-relaxed text-mai-slate">
                    Kantor pusat dan fasilitas produksi kami — kunjungi langsung atau buka rutenya di Google Maps.
                </p>
            </div>

            <div class="mt-14 grid grid-cols-1 gap-6 lg:grid-cols-2">
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
        </div>
    </section>

    {{-- 7. Client proof --}}
    <section class="bg-mai-ivory py-20 sm:py-24">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-3xl text-center">
                <x-section-heading align="center" class="reveal mx-auto">
                    Dipercaya oleh brand dan institusi terkemuka
                </x-section-heading>
            </div>
            <div class="mt-12">
                <x-client-logos />
            </div>
        </div>
    </section>

    {{-- 8. Final CTA --}}
    <x-cta-section
        heading="Siap Bekerja Sama dengan Kami?"
        description="Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
    />

</x-layouts.app>
<x-layouts.app title="Layanan">

    <x-page-hero
        eyebrow="Layanan"
        title="Model Kerja Sama Produksi"
        description="Keahlian utama kami adalah Clothing Design &amp; Production, tersedia dalam dua model kerja sama."
    />

    {{-- CMT & FOB --}}
    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="reveal rounded-2xl border border-mai-border bg-white p-8 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md">
                    <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Jasa CMT</p>
                    <h2 class="mt-2 text-lg font-bold text-mai-charcoal">Cut, Make, Trim</h2>
                    <p class="mt-3 text-sm leading-relaxed text-mai-slate">
                        Kami mengerjakan proses potong, jahit, dan perapihan. Seluruh material ditentukan dan disediakan oleh konsumen.
                    </p>
                    <div class="mt-6">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin bertanya mengenai layanan Jasa CMT.'">
                            Tanya Jasa CMT
                        </x-whatsapp-button>
                    </div>
                </div>

                <div class="reveal rounded-2xl border border-mai-border bg-white p-8 transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md" style="--reveal-delay: 90ms">
                    <p class="text-xs font-bold uppercase tracking-widest text-mai-red">Jasa FOB</p>
                    <h2 class="mt-2 text-lg font-bold text-mai-charcoal">Free on Board</h2>
                    <p class="mt-3 text-sm leading-relaxed text-mai-slate">
                        Paket lengkap — penyediaan material hingga jasa penjahitan sampai produk selesai.
                    </p>
                    <div class="mt-6">
                        <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya ingin bertanya mengenai layanan Jasa FOB.'">
                            Tanya Jasa FOB
                        </x-whatsapp-button>
                    </div>
                </div>
            </div>

            <div class="reveal mt-8 rounded-2xl border border-mai-border bg-white p-8 text-center" style="--reveal-delay: 160ms">
                <p class="text-sm leading-relaxed text-mai-slate">
                    Detail lebih lanjut seperti lead time per jenis produk, skema pembayaran, dan ketersediaan kunjungan pabrik masih menunggu konfirmasi resmi dari tim Multi Andria Indonesia.
                </p>
                <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-mai-red">
                    [CONTENT NEEDED — lihat docs/CONTENT_REQUIREMENTS.md]
                </p>
            </div>
        </div>
    </section>

    {{-- Production Process --}}
    <section id="proses-produksi" class="scroll-mt-24 bg-mai-ivory py-16 sm:py-20">
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

    <x-cta-section
        heading="Konsultasikan Kebutuhan Produksi Anda"
        description="Diskusikan model kerja sama, lead time, dan spesifikasi produk dengan tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai proses dan kebutuhan produksi garment.'"
    />

</x-layouts.app>

<x-layouts.app title="Layanan">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Layanan</p>
            <h1 class="animate-fade-up mt-4 text-3xl font-extrabold text-white sm:text-4xl" style="--reveal-delay: 80ms">Model Kerja Sama Produksi</h1>
            <p class="animate-fade-up mx-auto mt-4 max-w-xl text-base text-white/70" style="--reveal-delay: 160ms">
                Keahlian utama kami adalah Clothing Design &amp; Production, tersedia dalam dua model kerja sama.
            </p>
        </div>
    </section>

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

</x-layouts.app>

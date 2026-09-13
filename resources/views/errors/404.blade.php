<x-layouts.app
    title="Halaman Tidak Ditemukan"
    robots="noindex, follow"
    solid-header
>
    <section class="flex min-h-[70vh] items-center justify-center bg-mai-ivory px-4 py-24">
        <div class="w-full max-w-lg text-center">
            <p class="text-sm font-bold uppercase tracking-widest text-mai-red">404</p>
            <h1 class="mt-4 text-3xl font-extrabold text-mai-charcoal sm:text-4xl">Halaman Tidak Ditemukan</h1>
            <p class="mt-4 text-base leading-relaxed text-mai-slate">
                Halaman yang Anda cari mungkin sudah dipindahkan atau tidak lagi tersedia. Silakan kembali ke halaman utama atau jelajahi halaman lain di situs kami.
            </p>
            <div class="mt-10 flex flex-wrap items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-lg bg-mai-red px-8 py-4 text-base font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 hover:bg-mai-wine motion-reduce:hover:translate-y-0">
                    Kembali ke Beranda
                </a>
                <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center rounded-lg border border-mai-border px-8 py-4 text-base font-semibold text-mai-charcoal transition-all duration-200 hover:-translate-y-0.5 hover:border-mai-red hover:text-mai-red motion-reduce:hover:translate-y-0">
                    Lihat Portofolio
                </a>
            </div>
            <ul class="mt-8 flex flex-wrap items-center justify-center gap-x-6 gap-y-2 text-sm">
                <li><a href="{{ route('about') }}" class="font-semibold text-mai-slate hover:text-mai-red">Tentang Kami</a></li>
                <li><a href="{{ route('services') }}" class="font-semibold text-mai-slate hover:text-mai-red">Layanan</a></li>
            </ul>
        </div>
    </section>
</x-layouts.app>

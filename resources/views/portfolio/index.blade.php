<x-layouts.app title="Portfolio">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">Portfolio</p>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">Hasil Produksi Kami</h1>
        </div>
    </section>

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if($projects->isEmpty())
                <div class="rounded-2xl border border-mai-border bg-white p-8 text-center sm:p-12">
                    <p class="text-sm leading-relaxed text-mai-slate">
                        Riwayat proyek kami mencakup produksi untuk Kementerian Kesehatan, MPR RI, Bawaslu, Pertamina, Bank Mandiri, dan Kabupaten Solok Selatan — namun foto proyek nyata belum tersedia untuk ditampilkan di sini.
                    </p>
                    <p class="mt-4 text-xs font-semibold uppercase tracking-wide text-mai-red">
                        [CONTENT NEEDED — foto portfolio asli, lihat docs/CONTENT_REQUIREMENTS.md]
                    </p>
                </div>
            @else
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($projects as $project)
                        <div class="overflow-hidden rounded-xl border border-mai-border bg-white">
                            <div class="aspect-square bg-mai-gray">
                                @if($project->cover_image_url)
                                    <img src="{{ $project->cover_image_url }}" alt="{{ $project->title }}" class="h-full w-full object-cover">
                                @endif
                            </div>
                            <div class="p-5">
                                <p class="text-sm font-bold text-mai-charcoal">{{ $project->title }}</p>
                                @if($project->client_name)
                                    <p class="text-xs text-mai-slate">{{ $project->client_name }} @if($project->year) &middot; {{ $project->year }} @endif</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-10 text-center">
                <x-whatsapp-button size="md" :message="'Halo Multi Andria Indonesia, saya tertarik dengan produksi seperti portofolio Anda. Saya ingin berkonsultasi mengenai kebutuhan produksi saya.'">
                    Buat Produk Serupa
                </x-whatsapp-button>
            </div>
        </div>
    </section>

</x-layouts.app>

<x-layouts.app title="Produk">

    <x-page-hero
        eyebrow="Produk"
        title="Kapabilitas Produk Kami"
        description="Contoh kategori yang kami produksi. Setiap kebutuhan dapat disesuaikan — hubungi kami untuk konsultasi spesifikasi, bahan, dan jumlah pesanan."
    />

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-wrap gap-2" aria-label="Filter produk">
                <a href="{{ route('products') }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') ? 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' : 'border-mai-red bg-mai-red text-white' }}" {{ request('type') ? '' : 'aria-current="page"' }}>
                    Semua
                </a>
                @foreach($productTypes as $slug => $label)
                    <a href="{{ route('products', ['type' => $slug]) }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') === $slug ? 'border-mai-red bg-mai-red text-white' : 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' }}" {{ request('type') === $slug ? 'aria-current="page"' : '' }}>
                        {{ $label }}
                    </a>
                @endforeach
            </div>

            @if($products->isEmpty())
                <p class="mt-16 text-center text-sm text-mai-slate">Belum ada produk pada kategori ini.</p>
            @else
                <div class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($products as $product)
                        <div class="reveal group overflow-hidden rounded-xl border border-mai-border bg-white transition-all duration-200 hover:-translate-y-1 hover:border-mai-red hover:shadow-md" style="--reveal-delay: {{ min($loop->index * 60, 360) }}ms">
                            <div class="aspect-square overflow-hidden bg-mai-gray">
                                <img
                                    src="{{ $product->primary_image_url }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-cover transition-transform duration-500 ease-out group-hover:scale-105"
                                    loading="lazy"
                                    width="800"
                                    height="800"
                                >
                            </div>
                            <div class="p-5">
                                <p class="text-xs font-semibold uppercase tracking-wide text-mai-red">{{ $product->product_type_name }}</p>
                                <h3 class="mt-1 text-base font-bold text-mai-charcoal">{{ $product->name }}</h3>
                                @if($product->description)
                                    <p class="mt-2 line-clamp-2 text-sm text-mai-slate">{{ $product->description }}</p>
                                @endif
                                @if($product->moq)
                                    <p class="mt-2 text-xs text-mai-slate">MOQ {{ $product->moq }} pcs</p>
                                @endif
                                <div class="mt-4">
                                    <x-whatsapp-button
                                        size="md"
                                        class="w-full"
                                        :message="'Halo Multi Andria Indonesia, saya tertarik dengan produk '.$product->name.'. Saya ingin mendapatkan informasi mengenai harga dan minimum order.'"
                                    >
                                        Tanya via WhatsApp
                                    </x-whatsapp-button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <p class="mt-12 text-center text-xs text-mai-slate">
                [CONTENT NEEDED — jumlah SKU per kategori masih terbatas menunggu tambahan contoh produk dari bisnis. Lihat docs/CONTENT_REQUIREMENTS.md.]
            </p>
        </div>
    </section>

    <x-cta-section
        heading="Siap Memulai Produksi?"
        description="Diskusikan kebutuhan garment Anda bersama tim Multi Andria Indonesia."
        :whatsapp-message="'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan produksi garment.'"
        secondary-label="Lihat Portofolio"
        secondary-url="{{ route('portfolio') }}"
    />

</x-layouts.app>

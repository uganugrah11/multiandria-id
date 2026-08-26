<x-layouts.app title="Produk">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="animate-fade-up text-xs font-bold uppercase tracking-widest text-mai-soft-red">Produk</p>
            <h1 class="animate-fade-up mt-4 text-3xl font-extrabold text-white sm:text-4xl" style="--reveal-delay: 80ms">Kapabilitas Produksi Kami</h1>
            <p class="animate-fade-up mx-auto mt-4 max-w-xl text-base text-white/70" style="--reveal-delay: 160ms">
                Contoh kategori yang kami produksi. Setiap kebutuhan dapat disesuaikan — hubungi kami untuk konsultasi spesifikasi, bahan, dan jumlah pesanan.
            </p>
        </div>
    </section>

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('products.index') }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') ? 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' : 'border-mai-red bg-mai-red text-white' }}">
                    Semua
                </a>
                @foreach($productTypes as $slug => $label)
                    <a href="{{ route('products.index', ['type' => $slug]) }}" class="rounded-full border px-4 py-2 text-xs font-semibold transition-colors duration-150 {{ request('type') === $slug ? 'border-mai-red bg-mai-red text-white' : 'border-mai-border text-mai-charcoal hover:border-mai-charcoal' }}">
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

</x-layouts.app>

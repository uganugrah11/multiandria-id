<x-layouts.admin title="Produk">

    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-mai-charcoal">Produk</h1>
        <a href="{{ route('admin.products.create') }}" class="rounded-lg bg-mai-red px-4 py-2 text-sm font-semibold text-white hover:bg-mai-wine">
            + Tambah Produk
        </a>
    </div>

    <div class="mt-6 overflow-x-auto rounded-xl border border-mai-border bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-mai-border bg-mai-gray text-xs font-semibold uppercase tracking-wide text-mai-slate">
                <tr>
                    <th class="px-4 py-3">Produk</th>
                    <th class="px-4 py-3">Kategori</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-mai-border">
                @forelse($products as $product)
                    <tr>
                        <td class="flex items-center gap-3 px-4 py-3">
                            <img src="{{ $product->primary_image_url }}" alt="" class="h-10 w-10 rounded-lg object-cover" width="40" height="40">
                            <span class="font-semibold text-mai-charcoal">{{ $product->name }}</span>
                        </td>
                        <td class="px-4 py-3 text-mai-slate">{{ $product->product_type_name }}</td>
                        <td class="px-4 py-3">
                            @if($product->is_active)
                                <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800">Aktif</span>
                            @else
                                <span class="rounded-full bg-mai-gray px-2.5 py-1 text-xs font-semibold text-mai-slate">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.products.edit', $product) }}" class="text-xs font-semibold text-mai-red hover:text-mai-wine">Edit</a>
                            <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="ml-3 text-xs font-semibold text-mai-slate hover:text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-4 py-8 text-center text-mai-slate">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>

</x-layouts.admin>

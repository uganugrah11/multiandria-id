@csrf
@if(isset($product)) @method('PUT') @endif

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2">
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <div>
                <label for="product-name" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Nama Produk</label>
                <input id="product-name" name="name" type="text" required value="{{ old('name', $product->name ?? '') }}" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}"
                    class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('name') ? 'border-red-300' : '' }}">
                @error('name')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="product-type" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Kategori</label>
                <select id="product-type" name="product_type" required aria-invalid="{{ $errors->has('product_type') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('product_type') ? 'border-red-300' : '' }}">
                    @foreach($productTypes as $slug => $label)
                        <option value="{{ $slug }}" @selected(old('product_type', $product->product_type ?? '') === $slug)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('product_type')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="product-description" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Deskripsi Singkat</label>
                <textarea id="product-description" name="description" rows="3" aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('description') ? 'border-red-300' : '' }}">{{ old('description', $product->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-4">
                <label for="product-moq" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">MOQ (opsional)</label>
                <input id="product-moq" name="moq" type="number" min="1" value="{{ old('moq', $product->moq ?? '') }}" aria-invalid="{{ $errors->has('moq') ? 'true' : 'false' }}"
                    class="mt-1 w-40 rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('moq') ? 'border-red-300' : '' }}">
                @error('moq')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="rounded-xl border border-mai-border bg-white p-6">
            <label class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Tambah Foto Produk</label>
            <input type="file" name="images[]" multiple accept="image/*" class="mt-2 block w-full text-sm">

            @if(isset($product) && $product->images->isNotEmpty())
                <div class="mt-4 grid grid-cols-3 gap-3 sm:grid-cols-4">
                    @foreach($product->images as $image)
                        <label class="relative block cursor-pointer overflow-hidden rounded-lg border {{ $image->is_primary ? 'border-mai-red' : 'border-mai-border' }}">
                            <img src="{{ $image->url }}" alt="" class="aspect-square w-full object-cover" width="200" height="200">
                            <span class="absolute inset-x-0 bottom-0 flex items-center justify-between bg-black/60 px-2 py-1 text-[10px] text-white">
                                <span class="flex items-center gap-1">
                                    <input type="radio" name="primary_image_id" value="{{ $image->id }}" @checked($image->is_primary)>
                                    Utama
                                </span>
                                <span class="flex items-center gap-1">
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}">
                                    Hapus
                                </span>
                            </span>
                        </label>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <div class="space-y-6">
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <label class="flex items-center gap-2 text-sm font-semibold text-mai-charcoal">
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $product->is_active ?? true))>
                Aktif (tampil di situs)
            </label>
            <label class="mt-3 flex items-center gap-2 text-sm font-semibold text-mai-charcoal">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $product->is_featured ?? false))>
                Tampilkan di Homepage
            </label>
        </div>

        <button type="submit" class="w-full rounded-lg bg-mai-red px-4 py-3 text-sm font-semibold text-white hover:bg-mai-wine">
            {{ isset($product) ? 'Simpan Perubahan' : 'Tambah Produk' }}
        </button>
    </div>
</div>

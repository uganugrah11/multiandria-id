@csrf
@if(isset($portfolio)) @method('PUT') @endif

<div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
    <div class="space-y-6 lg:col-span-2">
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <div>
                <label for="portfolio-title" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Judul Proyek</label>
                <input id="portfolio-title" name="title" type="text" required value="{{ old('title', $portfolio->title ?? '') }}" aria-invalid="{{ $errors->has('title') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('title') ? 'border-red-300' : '' }}">
                @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="portfolio-category" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Kategori (opsional)</label>
                    <input id="portfolio-category" name="category" type="text" value="{{ old('category', $portfolio->category ?? '') }}" aria-invalid="{{ $errors->has('category') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('category') ? 'border-red-300' : '' }}">
                    @error('category') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="portfolio-client" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Klien/Organisasi (opsional)</label>
                    <input id="portfolio-client" name="client_name" type="text" value="{{ old('client_name', $portfolio->client_name ?? '') }}" aria-invalid="{{ $errors->has('client_name') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('client_name') ? 'border-red-300' : '' }}">
                    @error('client_name') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-4 grid gap-4 sm:grid-cols-2">
                <div>
                    <label for="portfolio-year" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Tahun (opsional)</label>
                    <input id="portfolio-year" name="year" type="number" min="1900" max="{{ now()->year + 1 }}" value="{{ old('year', $portfolio->year ?? '') }}" aria-invalid="{{ $errors->has('year') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('year') ? 'border-red-300' : '' }}">
                    @error('year') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="portfolio-sort-order" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Urutan (opsional)</label>
                    <input id="portfolio-sort-order" name="sort_order" type="number" min="0" value="{{ old('sort_order', $portfolio->sort_order ?? 0) }}" aria-invalid="{{ $errors->has('sort_order') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('sort_order') ? 'border-red-300' : '' }}">
                    @error('sort_order') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mt-4">
                <label for="portfolio-description" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Deskripsi</label>
                <textarea id="portfolio-description" name="description" rows="4" aria-invalid="{{ $errors->has('description') ? 'true' : 'false' }}" class="mt-1 w-full rounded-lg border border-mai-border px-4 py-2.5 text-sm focus:border-mai-red focus:outline-none focus:ring-1 focus:ring-mai-red {{ $errors->has('description') ? 'border-red-300' : '' }}">{{ old('description', $portfolio->description ?? '') }}</textarea>
                @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="rounded-xl border border-mai-border bg-white p-6">
            <label for="portfolio-cover-image" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Foto Sampul</label>
            <input id="portfolio-cover-image" type="file" name="cover_image" accept="image/*" class="mt-2 block w-full text-sm">
            @error('cover_image') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror

            @if(isset($portfolio) && $portfolio->cover_image_url)
                <img src="{{ $portfolio->cover_image_url }}" alt="Sampul {{ $portfolio->title }}" class="mt-4 aspect-video w-full max-w-sm rounded-lg border border-mai-border object-cover" width="480" height="270">
            @endif
        </div>

        <div class="rounded-xl border border-mai-border bg-white p-6">
            <label for="portfolio-gallery-images" class="block text-xs font-semibold uppercase tracking-wide text-mai-slate">Foto Galeri</label>
            <input id="portfolio-gallery-images" type="file" name="gallery_images[]" multiple accept="image/*" class="mt-2 block w-full text-sm">
            @error('gallery_images.*') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror

            @if(isset($portfolio) && !empty($portfolio->gallery))
                <div class="mt-4 grid grid-cols-3 gap-3 sm:grid-cols-4">
                    @foreach($portfolio->gallery as $imagePath)
                        <label class="relative block cursor-pointer overflow-hidden rounded-lg border border-mai-border">
                            <img src="{{ Storage::url($imagePath) }}" alt="" class="aspect-square w-full object-cover" width="200" height="200">
                            <span class="absolute inset-x-0 bottom-0 bg-black/60 px-2 py-1 text-[10px] text-white">
                                <input type="checkbox" name="delete_gallery_paths[]" value="{{ $imagePath }}"> Hapus
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
                <input type="checkbox" name="is_active" value="1" @checked(old('is_active', $portfolio->is_active ?? true))>
                Aktif (tampil di situs)
            </label>
            <label class="mt-3 flex items-center gap-2 text-sm font-semibold text-mai-charcoal">
                <input type="checkbox" name="is_featured" value="1" @checked(old('is_featured', $portfolio->is_featured ?? false))>
                Tampilkan di Homepage
            </label>
        </div>

        <button type="submit" class="w-full rounded-lg bg-mai-red px-4 py-3 text-sm font-semibold text-white hover:bg-mai-wine">
            {{ isset($portfolio) ? 'Simpan Perubahan' : 'Tambah Portofolio' }}
        </button>
    </div>
</div>

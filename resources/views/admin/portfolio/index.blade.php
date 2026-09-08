<x-layouts.admin title="Portofolio">

    <div class="flex items-center justify-between">
        <h1 class="text-xl font-bold text-mai-charcoal">Portofolio</h1>
        <a href="{{ route('admin.portfolio.create') }}" class="rounded-lg bg-mai-red px-4 py-2 text-sm font-semibold text-white hover:bg-mai-wine">+ Tambah Portofolio</a>
    </div>

    <div class="mt-6 overflow-x-auto rounded-xl border border-mai-border bg-white">
        <table class="w-full text-left text-sm">
            <thead class="border-b border-mai-border bg-mai-gray text-xs font-semibold uppercase tracking-wide text-mai-slate">
                <tr><th class="px-4 py-3">Proyek</th><th class="px-4 py-3">Klien/Organisasi</th><th class="px-4 py-3">Status</th><th class="px-4 py-3"></th></tr>
            </thead>
            <tbody class="divide-y divide-mai-border">
                @forelse($portfolioProjects as $portfolio)
                    <tr>
                        <td class="flex items-center gap-3 px-4 py-3">
                            @if($portfolio->cover_image_url)
                                <img src="{{ $portfolio->cover_image_url }}" alt="" class="h-10 w-10 rounded-lg object-cover" width="40" height="40">
                            @else
                                <span class="block h-10 w-10 rounded-lg bg-mai-gray"></span>
                            @endif
                            <span class="font-semibold text-mai-charcoal">{{ $portfolio->title }}</span>
                        </td>
                        <td class="px-4 py-3 text-mai-slate">{{ $portfolio->client_name ?: '—' }}</td>
                        <td class="px-4 py-3">
                            @if($portfolio->is_active)<span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-semibold text-green-800">Aktif</span>@else<span class="rounded-full bg-mai-gray px-2.5 py-1 text-xs font-semibold text-mai-slate">Nonaktif</span>@endif
                        </td>
                        <td class="px-4 py-3 text-right">
                            <a href="{{ route('admin.portfolio.edit', $portfolio) }}" class="text-xs font-semibold text-mai-red hover:text-mai-wine">Edit</a>
                            <form method="POST" action="{{ route('admin.portfolio.destroy', $portfolio) }}" class="inline" onsubmit="return confirm('Hapus portofolio ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="ml-3 text-xs font-semibold text-mai-slate hover:text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="px-4 py-8 text-center text-mai-slate">Belum ada portofolio.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">{{ $portfolioProjects->links() }}</div>
</x-layouts.admin>

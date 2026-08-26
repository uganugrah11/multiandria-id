<x-layouts.admin title="Dashboard">

    <h1 class="text-xl font-bold text-mai-charcoal">Dashboard</h1>

    <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <p class="text-xs font-semibold uppercase tracking-wide text-mai-slate">Total Produk</p>
            <p class="mt-2 text-3xl font-extrabold text-mai-charcoal">{{ $stats['products'] }}</p>
        </div>
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <p class="text-xs font-semibold uppercase tracking-wide text-mai-slate">Produk Aktif</p>
            <p class="mt-2 text-3xl font-extrabold text-mai-charcoal">{{ $stats['active_products'] }}</p>
        </div>
        <div class="rounded-xl border border-mai-border bg-white p-6">
            <p class="text-xs font-semibold uppercase tracking-wide text-mai-slate">Portfolio Project</p>
            <p class="mt-2 text-3xl font-extrabold text-mai-charcoal">{{ $stats['portfolio_projects'] }}</p>
        </div>
    </div>

</x-layouts.admin>

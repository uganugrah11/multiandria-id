@props(['title' => null])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ? $title.' — Admin MAI' : 'Admin — Multi Andria Indonesia' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-mai-gray font-sans text-mai-charcoal antialiased">
    <div class="flex min-h-screen flex-col md:flex-row">
        <aside class="hidden w-64 shrink-0 border-r border-mai-border bg-white md:block">
            <div class="flex h-16 items-center gap-2 border-b border-mai-border px-6">
                <img src="{{ asset('images/logo-mai-transparent.png') }}" alt="MAI" class="h-8 w-8 object-contain" width="32" height="32">
                <span class="text-sm font-bold">MAI Admin</span>
            </div>
            <nav class="space-y-1 p-4" aria-label="Navigasi admin">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.products.*') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                    Produk
                </a>
            </nav>
        </aside>

        <div class="flex-1" x-data="{ mobileNavOpen: false }">
            <header class="flex h-16 items-center justify-between border-b border-mai-border bg-white px-4 sm:px-6">
                <div class="flex items-center gap-3 md:hidden">
                    <button
                        type="button"
                        @click="mobileNavOpen = !mobileNavOpen"
                        class="inline-flex h-10 w-10 items-center justify-center rounded-lg border border-mai-border text-mai-charcoal"
                        aria-label="Buka navigasi admin"
                        aria-controls="admin-mobile-nav"
                        :aria-expanded="mobileNavOpen"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="h-5 w-5" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    </button>
                    <img src="{{ asset('images/logo-mai-transparent.png') }}" alt="MAI" class="h-8 w-8 object-contain" width="32" height="32">
                </div>
                <a href="{{ route('home') }}" class="text-xs font-semibold text-mai-slate hover:text-mai-red">&larr; Lihat situs</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs font-semibold text-mai-slate hover:text-mai-red">Keluar</button>
                </form>
            </header>

            <nav id="admin-mobile-nav" x-show="mobileNavOpen" x-cloak class="border-b border-mai-border bg-white md:hidden" aria-label="Navigasi admin mobile">
                <div class="space-y-1 p-4">
                    <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.products.*') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                        Produk
                    </a>
                </div>
            </nav>

            <main class="p-4 sm:p-6">
                @if(session('success'))
                    <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-800">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>

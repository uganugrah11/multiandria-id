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
    <div class="flex min-h-screen">
        <aside class="hidden w-64 shrink-0 border-r border-mai-border bg-white md:block">
            <div class="flex h-16 items-center gap-2 border-b border-mai-border px-6">
                <img src="{{ asset('images/logo-mai-transparent.png') }}" alt="MAI" class="h-8 w-8 object-contain">
                <span class="text-sm font-bold">MAI Admin</span>
            </div>
            <nav class="space-y-1 p-4">
                <a href="{{ route('admin.dashboard') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                    Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}" class="block rounded-lg px-3 py-2 text-sm font-semibold {{ request()->routeIs('admin.products.*') ? 'bg-mai-red text-white' : 'text-mai-charcoal hover:bg-mai-gray' }}">
                    Produk
                </a>
            </nav>
        </aside>

        <div class="flex-1">
            <header class="flex h-16 items-center justify-between border-b border-mai-border bg-white px-4 sm:px-6">
                <a href="{{ route('home') }}" class="text-xs font-semibold text-mai-slate hover:text-mai-red">&larr; Lihat situs</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-xs font-semibold text-mai-slate hover:text-mai-red">Keluar</button>
                </form>
            </header>

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

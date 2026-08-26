@props([
    'title' => null,
    'description' => null,
])

<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ? $title.' — Multi Andria Indonesia' : 'Multi Andria Indonesia — Partner Produksi Garment untuk Bisnis dan Institusi' }}</title>
    <meta name="description" content="{{ $description ?? 'PT. Multi Andria Indonesia — produsen garment dan tekstil untuk kebutuhan bisnis, institusi, dan pemerintahan. Konsultasi produksi langsung via WhatsApp.' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-mai-ivory font-sans text-mai-charcoal antialiased">

    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:z-50 focus:m-4 focus:rounded-lg focus:bg-mai-red focus:px-4 focus:py-2 focus:text-white">
        Langsung ke konten
    </a>

    <header x-data="{ mobileOpen: false }" data-site-header class="sticky top-0 z-40 border-b border-mai-border bg-mai-ivory/95 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-2">
                <img src="{{ asset('images/logo-mai-transparent.png') }}" alt="Multi Andria Indonesia" class="h-10 w-10 object-contain">
                <span class="text-sm font-bold leading-tight sm:text-base">
                    Multi Andria<br class="sm:hidden"> Indonesia
                </span>
            </a>

            <nav class="hidden items-center gap-8 lg:flex">
                @php
                    $navLinks = [
                        'home' => ['route' => 'home', 'label' => 'Home'],
                        'about' => ['route' => 'about', 'label' => 'Tentang Kami'],
                        'products.index' => ['route' => 'products.index', 'label' => 'Produk'],
                        'services' => ['route' => 'services', 'label' => 'Layanan'],
                        'manufacturing' => ['route' => 'manufacturing', 'label' => 'Manufacturing'],
                        'portfolio.index' => ['route' => 'portfolio.index', 'label' => 'Portfolio'],
                        'contact' => ['route' => 'contact', 'label' => 'Kontak'],
                    ];
                @endphp
                @foreach($navLinks as $key => $link)
                    <a
                        href="{{ route($link['route']) }}"
                        @if(request()->routeIs($link['route'])) aria-current="page" @endif
                        class="nav-link text-sm font-semibold transition-colors {{ request()->routeIs($link['route']) ? 'text-mai-red' : 'text-mai-charcoal hover:text-mai-red' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <div class="hidden lg:block">
                <x-whatsapp-button size="md">Konsultasi via WhatsApp</x-whatsapp-button>
            </div>

            <button
                @click="mobileOpen = !mobileOpen"
                type="button"
                class="inline-flex items-center justify-center rounded-lg p-2 text-mai-charcoal lg:hidden"
                aria-label="Buka menu"
                :aria-expanded="mobileOpen"
            >
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="mobileOpen" x-cloak xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        <div
            x-show="mobileOpen"
            x-cloak
            x-transition
            class="border-t border-mai-border bg-mai-ivory px-4 pb-6 pt-2 lg:hidden"
        >
            <nav class="flex flex-col gap-1">
                @foreach($navLinks as $key => $link)
                    <a
                        href="{{ route($link['route']) }}"
                        class="rounded-lg px-3 py-3 text-sm font-semibold {{ request()->routeIs($link['route']) ? 'bg-white text-mai-red' : 'text-mai-charcoal hover:bg-white' }}"
                    >
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>
            <div class="mt-4">
                <x-whatsapp-button size="md" class="w-full">Konsultasi via WhatsApp</x-whatsapp-button>
            </div>
        </div>
    </header>

    <main id="main-content">
        {{ $slot }}
    </main>

    <footer class="border-t border-mai-border bg-white">
        <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-12 md:grid-cols-4">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('images/logo-mai-transparent.png') }}" alt="Multi Andria Indonesia" class="h-10 w-10 object-contain">
                        <span class="text-base font-bold">Multi Andria Indonesia</span>
                    </div>
                    <p class="mt-4 max-w-sm text-sm leading-relaxed text-mai-slate">
                        Produsen garment dan tekstil untuk kebutuhan bisnis, institusi, dan pemerintahan sejak 2014.
                    </p>
                    @if(config('company.social.instagram') || config('company.social.tiktok') || config('company.social.linkedin'))
                        <div class="mt-6 flex items-center gap-4">
                            @if($ig = config('company.social.instagram'))
                                <a href="{{ $ig }}" class="text-sm font-semibold text-mai-slate hover:text-mai-red">Instagram</a>
                            @endif
                            @if($tt = config('company.social.tiktok'))
                                <a href="{{ $tt }}" class="text-sm font-semibold text-mai-slate hover:text-mai-red">TikTok</a>
                            @endif
                            @if($li = config('company.social.linkedin'))
                                <a href="{{ $li }}" class="text-sm font-semibold text-mai-slate hover:text-mai-red">LinkedIn</a>
                            @endif
                        </div>
                    @endif
                </div>

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-mai-slate">Navigasi</p>
                    <ul class="mt-4 space-y-3 text-sm">
                        <li><a href="{{ route('about') }}" class="text-mai-charcoal hover:text-mai-red">Tentang Kami</a></li>
                        <li><a href="{{ route('products.index') }}" class="text-mai-charcoal hover:text-mai-red">Produk</a></li>
                        <li><a href="{{ route('services') }}" class="text-mai-charcoal hover:text-mai-red">Layanan</a></li>
                        <li><a href="{{ route('manufacturing') }}" class="text-mai-charcoal hover:text-mai-red">Manufacturing</a></li>
                        <li><a href="{{ route('portfolio.index') }}" class="text-mai-charcoal hover:text-mai-red">Portfolio</a></li>
                    </ul>
                </div>

                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-mai-slate">Kontak</p>
                    <ul class="mt-4 space-y-3 text-sm text-mai-charcoal">
                        <li>{{ config('company.address.hq') }}</li>
                        @if(config('company.email'))
                            <li><a href="mailto:{{ config('company.email') }}" class="hover:text-mai-red">{{ config('company.email') }}</a></li>
                        @endif
                        @if(config('company.phone'))
                            <li><a href="tel:{{ config('company.phone') }}" class="hover:text-mai-red">{{ config('company.phone') }}</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="mt-12 flex flex-col items-center justify-between gap-4 border-t border-mai-border pt-8 text-xs text-mai-slate sm:flex-row">
                <p>&copy; {{ date('Y') }} PT. Multi Andria Indonesia. Seluruh hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    {{-- Mobile sticky WhatsApp CTA --}}
    <div class="fixed inset-x-0 bottom-0 z-30 border-t border-mai-border bg-white p-3 lg:hidden">
        <x-whatsapp-button size="md" class="w-full">💬 Konsultasi via WhatsApp</x-whatsapp-button>
    </div>
    <div class="h-20 lg:hidden"></div>

</body>
</html>

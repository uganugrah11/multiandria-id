<x-layouts.app title="Kontak">

    <section class="bg-mai-charcoal py-16 sm:py-20">
        <div class="mx-auto max-w-4xl px-4 text-center sm:px-6 lg:px-8">
            <p class="text-xs font-bold uppercase tracking-widest text-mai-soft-red">Kontak</p>
            <h1 class="mt-4 text-3xl font-extrabold text-white sm:text-4xl">Hubungi Kami</h1>
            <p class="mx-auto mt-4 max-w-xl text-base text-white/70">
                Cara tercepat menghubungi kami adalah melalui WhatsApp — tim kami siap membantu konsultasi kebutuhan produksi Anda.
            </p>
        </div>
    </section>

    <section class="bg-mai-ivory py-16 sm:py-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-mai-red">WhatsApp</h2>
                    <p class="mt-2 text-sm text-mai-slate">Cara tercepat untuk konsultasi dan penawaran.</p>
                    <div class="mt-4">
                        <x-whatsapp-button size="md">Konsultasi via WhatsApp</x-whatsapp-button>
                    </div>
                </div>

                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-mai-red">Email &amp; Telepon</h2>
                    <ul class="mt-3 space-y-2 text-sm text-mai-charcoal">
                        <li><a href="mailto:{{ config('company.email') }}" class="hover:text-mai-red">{{ config('company.email') }}</a></li>
                        <li><a href="tel:{{ config('company.phone') }}" class="hover:text-mai-red">{{ config('company.phone') }}</a></li>
                    </ul>
                </div>

                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-mai-red">Kantor Pusat — Bintaro</h2>
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ config('company.address.hq') }}</p>
                </div>

                <div class="rounded-2xl border border-mai-border bg-white p-8">
                    <h2 class="text-sm font-bold uppercase tracking-wide text-mai-red">Pabrik Produksi — Sukabumi</h2>
                    <p class="mt-2 text-sm leading-relaxed text-mai-slate">{{ config('company.address.factory') }}</p>
                </div>
            </div>
        </div>
    </section>

</x-layouts.app>

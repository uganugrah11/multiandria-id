@props([
    'phoneNumber' => null,
    'defaultMessage' => null,
    'popupTitle' => 'Free Clothing Manufacturing Consultation (Factory Capacity: 5,000 pcs/day)',
    'popupSubtitle' => 'Free, today only.',
    'showPopupByDefault' => true,
    'popupDelay' => 1400,
])

@php
    $number = $phoneNumber ?? config('company.whatsapp.number');
    $message = $defaultMessage ?? config('company.whatsapp.default_message');
    $waUrl = 'https://wa.me/'.$number.'?text='.rawurlencode($message);
    $showPopup = filter_var($showPopupByDefault, FILTER_VALIDATE_BOOLEAN);
@endphp

<div
    x-data="{
        popupOpen: false,
        dismissed: false,
        init() {
            if (@js($showPopup)) {
                window.setTimeout(() => {
                    if (! this.dismissed) {
                        this.popupOpen = true;
                    }
                }, @js((int) $popupDelay));
            }
        },
        closePopup() {
            this.dismissed = true;
            this.popupOpen = false;
        },
    }"
    class="fixed bottom-28 right-4 z-50 flex flex-col items-end lg:bottom-6 lg:right-6"
>
    {{-- Chat bubbles --}}
    <div
        x-show="popupOpen"
        x-cloak
        x-transition:enter="transition ease-in-out duration-300 motion-reduce:transition-none motion-reduce:translate-y-0"
        x-transition:enter-start="opacity-0 translate-y-3"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in-out duration-200 motion-reduce:transition-none motion-reduce:translate-y-0"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 translate-y-3"
        class="mb-3 flex flex-col items-end gap-2"
    >
        <div class="relative max-w-[220px] rounded-2xl rounded-br-sm bg-white px-4 py-3 shadow-lg shadow-black/10 sm:max-w-xs">
            <button
                type="button"
                @click="closePopup()"
                aria-label="Tutup notifikasi WhatsApp"
                class="absolute -right-2 -top-2 inline-flex h-6 w-6 items-center justify-center rounded-full border border-mai-border bg-mai-ivory text-mai-slate shadow-sm transition-colors duration-200 hover:bg-mai-gray hover:text-mai-charcoal"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true">
                    <path d="M6 6l12 12M18 6L6 18"/>
                </svg>
            </button>
            <p class="text-xs font-medium leading-snug text-mai-charcoal sm:text-sm">{{ $popupTitle }}</p>
        </div>

        <div class="relative rounded-xl bg-white px-3 py-1.5 shadow-md shadow-black/5">
            <p class="text-[11px] font-bold text-mai-red sm:text-xs">{{ $popupSubtitle }}</p>
            <span class="absolute -bottom-[6px] right-4 h-2.5 w-2.5 rotate-45 bg-white" aria-hidden="true"></span>
        </div>
    </div>

    {{-- Floating action button --}}
    <a
        href="{{ $waUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        @click="closePopup()"
        aria-label="Konsultasi via WhatsApp"
        class="group inline-flex h-14 w-14 items-center justify-center rounded-full bg-whatsapp text-white shadow-lg shadow-black/20 transition-all duration-300 ease-in-out hover:scale-110 hover:bg-whatsapp-dark hover:shadow-xl active:scale-95 motion-reduce:hover:scale-100 sm:h-16 sm:w-16"
    >
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-6 w-6 transition-transform duration-300 ease-in-out group-hover:scale-110 sm:h-7 sm:w-7" aria-hidden="true">
            <path d="M12.04 2c-5.52 0-10 4.48-10 10 0 1.77.46 3.45 1.27 4.9L2 22l5.25-1.38a9.96 9.96 0 0 0 4.79 1.22h.01c5.52 0 10-4.48 10-10s-4.48-10-10-10Zm0 18.15h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.11.82.83-3.03-.2-.31a8.2 8.2 0 0 1-1.26-4.3c0-4.54 3.7-8.24 8.24-8.24 2.2 0 4.27.86 5.83 2.41a8.18 8.18 0 0 1 2.41 5.83c0 4.54-3.7 8.24-8.24 8.24Zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81-.23-.08-.39-.12-.56.12-.16.25-.64.81-.78.97-.14.17-.29.19-.53.06-.25-.12-1.05-.39-2-1.23-.74-.66-1.24-1.47-1.39-1.72-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.12-.14.16-.25.25-.41.08-.17.04-.31-.02-.43-.06-.12-.56-1.34-.76-1.84-.2-.48-.4-.42-.56-.42-.14-.01-.31-.01-.47-.01a.9.9 0 0 0-.65.31c-.23.25-.86.84-.86 2.05 0 1.21.88 2.38 1 2.54.12.17 1.73 2.64 4.19 3.7.59.25 1.04.4 1.4.52.59.19 1.12.16 1.55.1.47-.07 1.47-.6 1.68-1.18.21-.58.21-1.08.14-1.18-.06-.11-.22-.17-.47-.29Z"/>
        </svg>
    </a>
</div>
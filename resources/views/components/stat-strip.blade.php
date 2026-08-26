@php
    $stats = [
        ['value' => config('company.stats.years_experience'), 'label' => 'Tahun Pengalaman'],
        ['value' => config('company.stats.happy_clients'), 'label' => 'Klien Puas'],
        ['value' => config('company.stats.production_capacity'), 'label' => 'Kapasitas Produksi'],
        ['value' => config('company.stats.employees'), 'label' => 'Karyawan'],
    ];
@endphp

<div class="grid grid-cols-2 gap-6 sm:grid-cols-4">
    @foreach($stats as $stat)
        <div class="text-center">
            <p class="text-3xl font-extrabold text-white sm:text-4xl">{{ $stat['value'] }}</p>
            <p class="mt-1 text-xs font-medium text-white/70 sm:text-sm">{{ $stat['label'] }}</p>
        </div>
    @endforeach
</div>

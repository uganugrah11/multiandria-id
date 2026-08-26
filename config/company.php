<?php

return [

    /*
    |--------------------------------------------------------------------------
    | WhatsApp
    |--------------------------------------------------------------------------
    |
    | The single source of truth for the WhatsApp number and default greeting
    | used by every <x-whatsapp-button> across the site. Never hardcode the
    | number in a Blade view — always go through this config.
    |
    */
    'whatsapp' => [
        'number' => env('COMPANY_WHATSAPP_NUMBER'),
        'default_message' => env(
            'COMPANY_WHATSAPP_DEFAULT_MESSAGE',
            'Halo Multi Andria Indonesia, saya ingin berkonsultasi mengenai kebutuhan garment.'
        ),
    ],

    'email' => env('COMPANY_EMAIL'),
    'phone' => env('COMPANY_PHONE'),

    'address' => [
        'hq' => env('COMPANY_HQ_ADDRESS'),
        'factory' => env('COMPANY_FACTORY_ADDRESS'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Social links
    |--------------------------------------------------------------------------
    |
    | CONTENT NEEDED: none of these are confirmed yet. Leave null until the
    | business supplies real account links; the footer only renders a link
    | when its value is present.
    |
    */
    'social' => [
        'instagram' => null,
        'tiktok' => null,
        'linkedin' => null,
    ],

    /*
    |--------------------------------------------------------------------------
    | Verified statistics
    |--------------------------------------------------------------------------
    |
    | Sourced from the live About Us page and the old codebase's timeline
    | data (see docs/DISCOVERY.md Task 2). Never invented — update only when
    | the business confirms new figures.
    |
    */
    'stats' => [
        'years_experience' => '12+',
        'happy_clients' => '100+',
        'product_categories' => '10',
        'countries_served' => '4+',
        'production_capacity' => '5.000 pcs/hari',
        'employees' => '600+',
    ],

    /*
    |--------------------------------------------------------------------------
    | Company timeline
    |--------------------------------------------------------------------------
    |
    | Verified against the live multiandriaindonesia.com/about-us page on
    | 2026-08-26 (see docs/DISCOVERY.md Task 2.6). Do not add years/claims
    | that aren't independently confirmed.
    |
    */
    'timeline' => [
        [
            'year' => 2012,
            'title' => 'Awal Mula',
            'description' => 'Fasilitas konveksi pertama kali berdiri di Bintaro, Tangerang Selatan (belum berbadan hukum PT).',
        ],
        [
            'year' => 2018,
            'title' => 'Pendirian Perusahaan',
            'description' => 'PT. Multi Andria Indonesia (PT. MAI) resmi berdiri pada 7 November 2018, dengan 50 karyawan.',
        ],
        [
            'year' => 2019,
            'title' => 'Ekspansi Sukabumi',
            'description' => 'Ekspansi ke Sukabumi dengan menyewa 3 ruko. Total karyawan Sukabumi mencapai 120 orang.',
        ],
        [
            'year' => 2020,
            'title' => 'Pabrik Sukabumi Berdiri',
            'description' => [
                'Pabrik Garmen Sukabumi resmi berdiri dengan luas bangunan 1.860 m².',
                'Menangani 15 klien, termasuk Kementerian Kesehatan (produksi masker), ZARA, dan Aurany.',
            ],
        ],
        [
            'year' => 2021,
            'title' => 'Klien Besar & Proyek B2G',
            'description' => [
                'Menangani proyek B2G: Kementerian Perindustrian dan Pengadaan MPR RI.',
                'Klien besar baru: Hush Puppies, Hammer, Coconut Island, ElZatta, Zoya.',
            ],
        ],
        [
            'year' => 2023,
            'title' => 'Perluasan Kantor Pusat',
            'description' => [
                'Perluasan fasilitas Bintaro dengan gedung 4 lantai sebagai kantor pusat & produksi.',
                'Menangani proyek B2G: Bawaslu, Pertamina, Bank Mandiri, Kabupaten Solok Selatan.',
            ],
        ],
        [
            'year' => 2024,
            'title' => 'Pertumbuhan Signifikan',
            'description' => [
                'Total karyawan mencapai 600 orang.',
                'Kapasitas produksi mencapai 5.000 pcs per hari.',
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Clients
    |--------------------------------------------------------------------------
    |
    | Logo files recovered from the old codebase (public/image/clients/) and
    | copied into this project's public/images/clients/. Real names, real
    | assets — verified against the live site's client lists.
    |
    */
    'clients' => [
        'b2b' => [
            ['name' => 'Hush Puppies', 'logo' => 'images/clients/hush-puppies.png'],
            ['name' => 'Cressida', 'logo' => 'images/clients/cressida.png'],
            ['name' => 'Coconut Island', 'logo' => 'images/clients/coconut-island.png'],
            ['name' => 'Hammer', 'logo' => 'images/clients/hammer.png'],
            ['name' => 'Zoya', 'logo' => 'images/clients/zoya.png'],
            ['name' => 'Affa Sport', 'logo' => 'images/clients/affa-sport.png'],
            ['name' => 'Nararya', 'logo' => 'images/clients/nararya.png'],
            ['name' => 'Nha Miranda', 'logo' => 'images/clients/nha-miranda.png'],
            ['name' => 'Thoiba', 'logo' => 'images/clients/thoibe.png'],
            ['name' => 'Aurany', 'logo' => 'images/clients/aurany.png'],
            ['name' => 'Yovis Sport', 'logo' => 'images/clients/yovis-sport.png'],
        ],
        'b2g' => [
            ['name' => 'MPR RI', 'logo' => 'images/clients/mpr-ri.png'],
            ['name' => 'Kominfo', 'logo' => 'images/clients/kominfo.png'],
            ['name' => 'Kementerian Pertanian', 'logo' => 'images/clients/kementan.png'],
            ['name' => 'Bank Mandiri', 'logo' => 'images/clients/mandiri.png'],
            ['name' => 'Kementerian Perindustrian', 'logo' => 'images/clients/kemenperin.png'],
            ['name' => 'Bawaslu', 'logo' => 'images/clients/bawaslu.png'],
            ['name' => 'Pertamina', 'logo' => 'images/clients/pertamina.png'],
            ['name' => 'Kabupaten Solok Selatan', 'logo' => 'images/clients/pemkab-solok-selatan.png'],
            ['name' => 'SMA Negeri 31 Jakarta', 'logo' => 'images/clients/sman-31-jakarta.png'],
        ],
    ],

];

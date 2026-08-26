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
    | Company description, vision & mission
    |--------------------------------------------------------------------------
    |
    | Verbatim from the Company Profile PDF (public/company_profile.pdf),
    | "Tentang Kami" / "Visi & Misi" pages — the source of truth per explicit
    | instruction (2026-08-28). See docs/CONTENT_AUDIT.md for the full
    | before/after comparison against what the site previously said.
    |
    | Two corrections applied to the raw PDF text:
    | - "sejak tahun 2012" → kept as 2014 throughout the site, matching the
    |   PDF's own timeline graphic (see the 'timeline' note below) rather
    |   than its intro paragraph, which disagrees with itself.
    | - "Pelayanan profresional" → fixed to "Pelayanan profesional" (typo
    |   in the source PDF itself).
    |
    */
    'description' => 'PT Multi Andria Indonesia (PT MAI) adalah perusahaan yang bergerak di bidang konveksi & distributor bahan tekstil serta produk fashion. Berdiri sejak 2014, PT MAI dikenal karena kualitas & standar tinggi dalam produksinya, lead time yang singkat, serta berkomitmen pada praktik bisnis yang berkelanjutan dan bertanggung jawab.',

    'vision' => "Menjadi perusahaan industri garmen terintegrasi nomor 1 di Indonesia yang memberikan pelayanan profesional dan kualitas produk terbaik, serta berkontribusi pada perkembangan industri tekstil nasional.",

    /*
    | The PDF lists exactly 5 mission points. The site previously showed 6
    | (including a "Keunggulan berkelanjutan" / Continuous Excellence item
    | that isn't in the Company Profile at all — it was carried over from
    | the old live site's separate, six-pillar English mission). Dropped
    | per "prefer the Company Profile" — see docs/CONTENT_AUDIT.md.
    */
    'mission' => [
        'Produk berkualitas tinggi.',
        'Berinovasi dalam desain dan teknologi.',
        'Pelayanan profesional.',
        'Menerapkan praktik produksi yang ramah lingkungan.',
        'Berkontribusi positif pada masyarakat & lingkungan sekitar.',
    ],

    /*
    |--------------------------------------------------------------------------
    | Keunggulan Kami (Our Advantages)
    |--------------------------------------------------------------------------
    |
    | Verbatim from the Company Profile's "Keunggulan Kami" page — "3 poin
    | keunggulan kami dibanding kompetitor." Replaces the site's previous
    | "Why Multi Andria" cards, which were staff-written rather than sourced
    | from the business (see docs/CONTENT_AUDIT.md).
    |
    */
    'advantages' => [
        [
            'title' => 'Dapat Memfasilitasi Produksi Skala Besar',
            'description' => 'Kami memiliki kapasitas dan infrastruktur yang mumpuni untuk memfasilitasi produksi dalam skala besar, memastikan setiap pesanan dipenuhi tepat waktu dengan kualitas yang konsisten.',
        ],
        [
            'title' => 'Jaminan Kualitas Produk & Pengiriman Premium',
            'description' => 'Kami memiliki standar untuk Quality Control (QC) yang komprehensif, mulai dari tahap desain, pemilihan bahan, penjahitan & perapihan, pengemasan, dan pengiriman.',
        ],
        [
            'title' => 'After Sales Service',
            'description' => 'Kami menyediakan layanan purna jual untuk memastikan kebutuhan konsumen selalu terpenuhi.',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Certifications & legal registration
    |--------------------------------------------------------------------------
    |
    | Verified from the Company Profile's "Sertifikat dan Legalitas Kami"
    | page. Previously the site stated no certifications existed — this was
    | true only because the live site never mentioned any; the Company
    | Profile shows PT MAI is ISO 9001:2015 certified.
    |
    */
    'certifications' => [
        ['label' => 'Akta Pendirian', 'value' => '7 November 2018'],
        ['label' => 'NIB', 'value' => '8120016161003'],
        ['label' => 'ISO 9001:2015', 'value' => 'Bersertifikat'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Testimonials
    |--------------------------------------------------------------------------
    |
    | CONTENT NEEDED: intentionally empty. No testimonial appears anywhere
    | in the Company Profile, the old codebase, or the live site — see
    | docs/CONTENT_AUDIT.md and docs/CONTENT_REQUIREMENTS.md. Per explicit
    | instruction, testimonials must never be fabricated, so this stays an
    | empty array (not placeholder/dummy entries) until the business
    | supplies real ones. The homepage section still exists and renders a
    | designed "coming soon" state rather than being fabricated or removed
    | — see <x-testimonial-carousel> and its usage in home.blade.php.
    |
    | Shape once populated:
    | ['quote' => '...', 'name' => '...', 'company' => '...', 'role' => null, 'logo' => null]
    |
    */
    'testimonials' => [],

    /*
    |--------------------------------------------------------------------------
    | Production process
    |--------------------------------------------------------------------------
    |
    | Verified against two Company Profile sources, not invented or assumed:
    | - The "Keunggulan Kami" QC description names the stage sequence: "mulai
    |   dari tahap desain, pemilihan bahan, penjahitan & perapihan,
    |   pengemasan, dan pengiriman."
    | - The "Jasa CMT" definition separately names the three verbs "potong,
    |   jahit, dan perapihan" (cut, sew, trim/finish) — which is why cutting
    |   and sewing appear as distinct steps here rather than staying folded
    |   into one "penjahitan & perapihan" step.
    | "Konsultasi & Brief" is included as step 1 because it's the site's own
    | established starting point (every WhatsApp CTA is that consultation),
    | not a manufacturing-capability claim needing separate verification.
    |
    | Deliberately NOT included as steps, because nothing in the Company
    | Profile or live site confirms MAI performs them in-house: sample-making,
    | printing, and embroidery (see docs/CONTENT_REQUIREMENTS.md). Quality
    | Control is likewise not a numbered step here — the Profile describes QC
    | as applying across every stage ("dari tahap desain... hingga
    | pengiriman"), not as one discrete stage in the sequence — so it's
    | surfaced as a supporting note on the Manufacturing page instead.
    |
    */
    'process_steps' => [
        [
            'title' => 'Konsultasi & Brief',
            'description' => 'Kami memahami kebutuhan produksi, spesifikasi produk, jumlah, dan material yang diperlukan sebelum produksi dimulai.',
            'icon' => 'chat',
        ],
        [
            'title' => 'Desain',
            'description' => 'Tim kami menyiapkan desain sesuai kebutuhan dan spesifikasi yang telah disepakati.',
            'icon' => 'pencil',
        ],
        [
            'title' => 'Pemilihan Material',
            'description' => 'Bahan dipilih dan disiapkan sesuai jenis produk dan kebutuhan konsumen.',
            'icon' => 'swatch',
        ],
        [
            'title' => 'Cutting',
            'description' => 'Proses pemotongan bahan sesuai pola dan ukuran yang telah ditentukan.',
            'icon' => 'scissors',
        ],
        [
            'title' => 'Sewing',
            'description' => 'Proses penjahitan dilakukan oleh tim produksi kami.',
            'icon' => 'needle',
        ],
        [
            'title' => 'Finishing',
            'description' => 'Perapihan detail produk untuk memastikan hasil akhir yang rapi dan konsisten.',
            'icon' => 'sparkle',
        ],
        [
            'title' => 'Pengemasan',
            'description' => 'Produk dikemas dengan standar yang terjaga sebelum dikirim.',
            'icon' => 'box',
        ],
        [
            'title' => 'Pengiriman',
            'description' => 'Produk jadi dikirim ke lokasi tujuan sesuai kesepakatan.',
            'icon' => 'truck',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Locations (Google Maps)
    |--------------------------------------------------------------------------
    |
    | Real locations only — see docs/CONTENT_REQUIREMENTS.md. The HQ pin was
    | verified 2026-08-28 by resolving the business-supplied Google Maps
    | short link (https://maps.app.goo.gl/TrkkRuZdC2YZ7KLg6), which redirects
    | to Google's own "PT. MULTI ANDRIA INDONESIA" place record at
    | -6.2795085, 106.7340992 — so `map_query` uses those exact coordinates
    | rather than a fuzzy address-text search.
    |
    | The factory has no equivalent short link, only a verified postal
    | address, so its `map_query` is the address text itself — Google
    | geocodes it directly, same approach used by `maps_url` (a plain
    | Maps search URL, since no business-supplied pin exists for it).
    |
    */
    'locations' => [
        [
            'key' => 'hq',
            'name' => 'Kantor Pusat',
            'type' => 'Head Office',
            'address' => env('COMPANY_HQ_ADDRESS'),
            'map_query' => '-6.2795085,106.7340992',
            'maps_url' => 'https://maps.app.goo.gl/TrkkRuZdC2YZ7KLg6',
        ],
        [
            'key' => 'factory',
            'name' => 'Fasilitas Produksi',
            'type' => 'Production Facility',
            'address' => env('COMPANY_FACTORY_ADDRESS'),
            'map_query' => env('COMPANY_FACTORY_ADDRESS'),
            'maps_url' => 'https://www.google.com/maps/search/?api=1&query='.rawurlencode((string) env('COMPANY_FACTORY_ADDRESS')),
        ],
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
    | The Company Profile PDF's table of contents lists a "Pencapaian"
    | (Achievements) page that would be the more authoritative source for
    | these — but its content renders as a graphic/infographic with no
    | extractable text layer, so it could not be read or cross-checked here.
    | CONTENT NEEDED: confirm these figures still match that page. See
    | docs/CONTENT_AUDIT.md.
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
    | Verified against the Company Profile PDF (public/company_profile.pdf)
    | on 2026-08-27, cross-checked against the live multiandriaindonesia.com
    | /about-us page captured 2026-08-26 (see docs/DISCOVERY.md Task 2.6).
    |
    | Note: the Company Profile's own intro paragraph says "berdiri sejak
    | tahun 2012," but its timeline graphic dates the first (pre-PT)
    | milestone to 2014, and 2018 employee count reads 20 (not the 50 the
    | live site's About page shows). Timeline below follows the PDF's own
    | timeline graphic — the more specific, purpose-built source — since
    | that's also the structure the redesign brief itself was built around.
    | CONTENT NEEDED: business to confirm which figure (2012 vs. 2014, 20 vs.
    | 50 employees in 2018) is correct so every page agrees.
    |
    | Do not add years/claims that aren't in one of these two sources.
    |
    */
    'timeline' => [
        [
            'year' => '2014',
            'title' => 'Awal Mula',
            'description' => 'Fasilitas konveksi pertama kali berdiri di Bintaro, Tangerang Selatan (belum berbadan hukum PT).',
        ],
        [
            'year' => '2018',
            'title' => 'Pendirian Perusahaan',
            'description' => 'PT. Multi Andria Indonesia (PT. MAI) resmi berdiri pada 7 November 2018, dengan 20 karyawan.',
        ],
        [
            'year' => '2019',
            'title' => 'Ekspansi Sukabumi',
            'description' => 'Ekspansi ke Sukabumi dengan menyewa 3 ruko. Total karyawan Sukabumi mencapai 120 orang.',
        ],
        [
            'year' => '2020',
            'title' => 'Pabrik Sukabumi Berdiri',
            'description' => [
                'Pabrik Garmen Sukabumi resmi berdiri dengan luas bangunan 1.860 m².',
                'Menangani 15 klien, termasuk Kementerian Kesehatan (produksi masker), ZARA, dan Aurany.',
            ],
        ],
        [
            'year' => '2021–2022',
            'title' => 'Klien Besar & Proyek B2G',
            'description' => [
                'Menangani proyek B2G: Kementerian Perindustrian dan Pengadaan MPR RI.',
                'Klien besar baru: Hush Puppies, Hammer, Coconut Island, ElZatta, Zoya.',
            ],
        ],
        [
            'year' => '2023',
            'title' => 'Perluasan Kantor Pusat',
            'description' => [
                'Perluasan fasilitas Bintaro dengan gedung 4 lantai sebagai kantor pusat & produksi.',
                'Menangani proyek B2G: Bawaslu, Pertamina, Bank Mandiri, Kabupaten Solok Selatan.',
            ],
        ],
        [
            'year' => '2024',
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

<?php

return [
    'site_name' => 'Multi Andria Indonesia',
    'site_url' => rtrim(env('SEO_SITE_URL', env('APP_URL', 'http://localhost:8000')), '/'),
    'locale' => 'id_ID',
    'type' => 'website',
    'default_title' => 'Jasa Konveksi & Produksi Garment Indonesia | Multi Andria Indonesia',
    'default_description' => 'PT Multi Andria Indonesia melayani jasa konveksi dan produksi garment untuk bisnis, institusi, dan pemerintahan dengan standar kualitas dan proses produksi yang terjaga.',
    'default_image' => 'images/logo-mai-white-bg.png',
    'pages' => [
        'home' => ['title' => 'Jasa Konveksi & Produksi Garment Indonesia | Multi Andria Indonesia', 'description' => 'Jasa konveksi dan produksi garment untuk bisnis, institusi, dan pemerintahan. Multi Andria Indonesia melayani kebutuhan produksi dari konsultasi hingga pengiriman.'],
        'about' => ['title' => 'Tentang Multi Andria Indonesia | Perusahaan Konveksi & Garment', 'description' => 'Kenali Multi Andria Indonesia, perusahaan konveksi dan garment yang berdiri sejak 2014 dengan fasilitas produksi di Bintaro dan Sukabumi.'],
        'services' => ['title' => 'Jasa Konveksi Garment & Produksi CMT/FOB | Multi Andria Indonesia', 'description' => 'Jasa konveksi dan produksi garment untuk bisnis, institusi, dan pemerintahan. Pilihan kerja sama CMT atau FOB dengan quality control dari desain hingga pengiriman.'],
        'portfolio' => ['title' => 'Portofolio Produksi Garment & Seragam | Multi Andria Indonesia', 'description' => 'Lihat portofolio produksi garment Multi Andria Indonesia, mulai dari seragam, kaos, jaket hingga produk custom untuk bisnis, institusi, komunitas, dan pemerintahan.'],
    ],
    'sitemap_routes' => ['home', 'about', 'services', 'portfolio'],
];

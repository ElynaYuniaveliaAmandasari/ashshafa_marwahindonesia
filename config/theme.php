<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi tema untuk aplikasi web Ash Shafa
    | Berisi informasi warna-warna utama yang digunakan di seluruh sistem
    |
    */

    'colors' => [
        'primary' => [
            'name' => 'Merah Maroon',
            'hex' => '#7A0000',
            'rgb' => 'rgb(122, 0, 0)',
            'description' => 'Warna utama untuk elemen-elemen penting seperti tombol utama, link, dan header'
        ],

        'secondary' => [
            'name' => 'Oranye',
            'hex' => '#FF9A00',
            'rgb' => 'rgb(255, 154, 0)',
            'description' => 'Warna sekunder untuk elemen pendukung dan aksen'
        ],

        'dark_text' => [
            'name' => 'Abu-abu Gelap',
            'hex' => '#0F1011',
            'rgb' => 'rgb(15, 16, 17)',
            'description' => 'Warna teks utama untuk kontras yang baik'
        ],

        'bg_hero' => [
            'name' => 'Merah Tua',
            'hex' => '#8A1515',
            'rgb' => 'rgb(138, 21, 21)',
            'description' => 'Background untuk elemen hero dan area penting'
        ],

        'text_color' => [
            'name' => 'Abu-abu Sedang',
            'hex' => '#4B5563',
            'rgb' => 'rgb(75, 85, 99)',
            'description' => 'Warna teks standar untuk isi konten'
        ]
    ],

    'theme_name' => 'Shafa',

    'css_files' => [
        'shafa-theme' => 'assets/css/shafa-theme.css',
    ],

    'js_files' => [
        'shafa-theme' => 'assets/js/shafa-theme.js',
    ],

    'active_theme' => env('ACTIVE_THEME', 'shafa'),
];
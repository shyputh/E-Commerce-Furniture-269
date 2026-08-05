<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi ini menentukan request cross-origin mana yang diizinkan
    | untuk API endpoint. Ubah 'allowed_origins' saat domain Vercel sudah diketahui.
    |
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // Saat domain Vercel sudah diketahui, ganti '*' dengan domain spesifik:
    // ['https://rumaseli.vercel.app']
    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [
        '#^https://.*\.vercel\.app$#',
    ],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];

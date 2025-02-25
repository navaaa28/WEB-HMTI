<?php

return [
    'auth' => [
        'guard' => 'admin',
    ],

    'broadcasting' => [],

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    'assets_path' => null,

    'cache_path' => base_path('bootstrap/cache/filament'),

    'livewire_loading_delay' => 'default',

    'resources' => [
        \App\Filament\Resources\AnggotaResource::class,
    ],
    'icons' => [
        'default' => 'heroicon-o', // Gunakan heroicon-outline
    ],
    'pages' => [
    // Halaman bawaan Filament
    \Filament\Pages\Dashboard::class,

    // Halaman custom Anda
    \App\Filament\Pages\VerifyQRCode::class,
],
'navigation' => [
    'groups' => [
        [
            'label' => 'Verifikasi',
            'items' => [
                \App\Filament\Pages\VerifyQRCode::class,
            ],
        ],
    ],
],
];

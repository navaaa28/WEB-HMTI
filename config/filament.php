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

],

    'layout' => [
        'sidebar' => [
            'is_collapsible_on_desktop' => true,
        ],
    ],
    'theme' => [
        'colors' => [
            'primary' => [
                50 => '238, 242, 255',
                100 => '224, 231, 255',
                200 => '199, 210, 254',
                300 => '165, 180, 252',
                400 => '129, 140, 248',
                500 => '99, 102, 241',
                600 => '79, 70, 229',
                700 => '67, 56, 202',
                800 => '55, 48, 163',
                900 => '49, 46, 129',
                950 => '30, 27, 75',
            ],
        ],
    ],
];

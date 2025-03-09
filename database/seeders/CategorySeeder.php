<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Berita HMTI',
                'description' => 'Berita terkini seputar kegiatan HMTI'
            ],
            [
                'name' => 'Event',
                'description' => 'Informasi event dan kegiatan yang akan datang'
            ],
            [
                'name' => 'Prestasi',
                'description' => 'Prestasi dan pencapaian mahasiswa Teknik Informatika'
            ],
            [
                'name' => 'Pengumuman',
                'description' => 'Pengumuman penting untuk mahasiswa'
            ],
            [
                'name' => 'Artikel',
                'description' => 'Artikel informatif seputar teknologi dan informatika'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Internship;
use Carbon\Carbon;

class InternshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $internships = [
            [
                'title' => 'Software Developer Intern',
                'company' => 'PT Teknologi Maju Indonesia',
                'description' => 'Kami mencari mahasiswa/i teknik industri yang memiliki passion di bidang pengembangan perangkat lunak. Akan terlibat dalam proyek-proyek pengembangan sistem manufaktur dan optimasi proses.',
                'requirements' => "- Mahasiswa aktif Teknik Industri semester 6-8\n- Memiliki kemampuan dasar pemrograman\n- Familiar dengan konsep Industri 4.0\n- Mampu bekerja dalam tim",
                'location' => 'Bandung, Jawa Barat',
                'deadline' => Carbon::now()->addDays(30),
                'start_date' => Carbon::now()->addDays(45),
                'duration' => '3 bulan',
                'is_active' => true
            ],
            [
                'title' => 'Supply Chain Management Intern',
                'company' => 'PT Logistik Nusantara',
                'description' => 'Program magang di bidang manajemen rantai pasok. Kesempatan untuk belajar dan praktik langsung dalam optimasi logistik, inventory management, dan distribusi.',
                'requirements' => "- Mahasiswa Teknik Industri semester 5 ke atas\n- IPK minimal 3.00\n- Menguasai MS Excel\n- Mampu menganalisis data",
                'location' => 'Jakarta Selatan',
                'deadline' => Carbon::now()->addDays(25),
                'start_date' => Carbon::now()->addDays(40),
                'duration' => '6 bulan',
                'is_active' => true
            ],
            [
                'title' => 'Quality Control Intern',
                'company' => 'PT Manufaktur Presisi',
                'description' => 'Magang di divisi Quality Control untuk mempelajari proses pengawasan mutu produk manufaktur. Akan dilibatkan dalam implementasi sistem manajemen mutu dan continuous improvement.',
                'requirements' => "- Mahasiswa tingkat akhir Teknik Industri\n- Memahami konsep Six Sigma\n- Teliti dan detail-oriented\n- Mampu membuat laporan analisis",
                'location' => 'Karawang, Jawa Barat',
                'deadline' => Carbon::now()->addDays(20),
                'start_date' => Carbon::now()->addDays(35),
                'duration' => '4 bulan',
                'is_active' => true
            ],
            [
                'title' => 'Production Planning Intern',
                'company' => 'PT Industri Solusi Global',
                'description' => 'Program magang di bidang perencanaan produksi. Kesempatan untuk terlibat dalam optimasi proses produksi, capacity planning, dan implementasi lean manufacturing.',
                'requirements' => "- Mahasiswa Teknik Industri semester 6-8\n- Memahami konsep PPC dan MRP\n- Kemampuan analitis yang baik\n- Proaktif dan komunikatif",
                'location' => 'Surabaya, Jawa Timur',
                'deadline' => Carbon::now()->addDays(40),
                'start_date' => Carbon::now()->addDays(55),
                'duration' => '6 bulan',
                'is_active' => true
            ],
            [
                'title' => 'Business Process Improvement Intern',
                'company' => 'PT Konsultan Industri Indonesia',
                'description' => 'Magang di perusahaan konsultan industri untuk project improvement dan optimasi proses bisnis. Akan terlibat dalam analisis proses, identifikasi waste, dan implementasi solusi.',
                'requirements' => "- Mahasiswa tingkat akhir Teknik Industri\n- Memahami konsep BPI dan Lean Six Sigma\n- Kemampuan presentasi yang baik\n- Mampu menggunakan tools analisis proses",
                'location' => 'Jakarta Pusat',
                'deadline' => Carbon::now()->addDays(15),
                'start_date' => Carbon::now()->addDays(30),
                'duration' => '3 bulan',
                'is_active' => true
            ]
        ];

        foreach ($internships as $internship) {
            Internship::create($internship);
        }
    }
}

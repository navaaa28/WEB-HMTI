@extends('layouts.app')
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@section('content')
    <div class="flex" x-data="{ sidebarOpen: false }">
        <!-- Header -->
        <header class="fixed top-0 left-0 w-full bg-white shadow-md z-40">
            <!-- Konten Header -->
        </header>

        <!-- Tombol Toggle untuk Sidebar (Mobile) -->
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden fixed top-4 left-4 z-50 p-2 bg-indigo-900 text-white rounded-lg shadow-lg">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar untuk Daftar Departemen -->
        <div class="absolute md:relative w-64 bg-indigo-900 shadow-lg p-4 h-screen overflow-y-auto transform transition-transform duration-300 md:translate-x-0 z-30" :class="{ '-translate-x-full': !sidebarOpen }">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <img src="{{ asset('storage/images/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>

            <h3 class="text-lg font-bold text-white mb-4 font-serif">Departemen</h3>
            <ul class="space-y-2">
                @foreach ($departemenList as $departemen)
                    <li>
                        <a href="#{{ Str::slug($departemen) }}" class="text-gray-300 hover:text-white transition duration-300">
                            {{ $departemen }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Overlay untuk Mobile (Saat Sidebar Dibuka) -->
        <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden"></div>

        <!-- Konten Utama -->
        <div class="flex-1 container mx-auto p-4 md:p-8 my-8 md:my-16 bg-white ml-0 md:ml-64" data-aos="fade-up">
            <div class="text-center">
                <h2 class="text-xl md:text-2xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">STRUKTUR ORGANISASI</h2>
                <h3 class="text-lg md:text-xl font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">HIMPUNAN MAHASISWA TEKNIK INDUSTRI</h3>
                <h4 class="text-md md:text-lg font-bold text-indigo-900 mb-2 font-serif" data-aos="fade-down">UNIVERSITAS TEKNOLOGI BANDUNG</h4>
                <p class="text-sm md:text-base text-indigo-900 mb-4 font-serif" data-aos="fade-down">PERIODE 2024-2025</p>
            </div>

            @php
                // Ambil Direktur Utama
                $direkturUtama = collect($groupedAnggotas)->flatten()->firstWhere('jabatan', 'Direktur Utama');

                // Hapus Direktur Utama dari daftar anggota agar tidak muncul dua kali
                if ($direkturUtama) {
                    foreach ($groupedAnggotas as $departemen => &$divisis) {
                        foreach ($divisis as $divisi => &$anggotas) {
                            $anggotas = collect($anggotas)->reject(fn($anggota) => $anggota->jabatan === 'Direktur Utama')->values()->all();
                        }
                    }
                }
            @endphp

            <!-- Tampilkan Direktur Utama -->
            @if ($direkturUtama)
                <div class="flex justify-center mb-8">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('storage/' . $direkturUtama->foto) }}" alt="Foto {{ $direkturUtama->nama }}" class="w-32 h-32 rounded-full mb-2 object-cover">
                        <h3 class="text-lg font-bold font-serif">{{ $direkturUtama->nama }}</h3>
                        <p class="text-sm text-gray-600 font-light">Direktur Utama</p>
                    </div>
                </div>
            @endif

            <!-- Tampilkan Departemen dan Divisi -->
            @foreach ($groupedAnggotas as $departemen => $divisis)
                <div id="{{ Str::slug($departemen) }}" class="mb-8">
                    <h3 class="text-2xl font-bold text-indigo-900 mb-4 font-serif text-center">{{ $departemen }}</h3>

                    @php
                        $kepalaDepartemen = collect($divisis)->flatten()->firstWhere('jabatan', 'Kepala Departemen');
                        $sekretarisDepartemen = collect($divisis)->flatten()->firstWhere('jabatan', 'Sekretaris Departemen');
                    @endphp

                    <!-- Tampilkan Kepala Departemen dan Sekretaris Departemen -->
                    @if ($kepalaDepartemen || $sekretarisDepartemen)
                        <div class="flex justify-center gap-12 mb-6">
                            @if ($kepalaDepartemen)
                                <div class="flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $kepalaDepartemen->foto) }}" alt="Foto {{ $kepalaDepartemen->nama }}" class="w-24 h-24 rounded-full mb-2 object-cover">
                                    <h3 class="text-lg font-bold font-serif">{{ $kepalaDepartemen->nama }}</h3>
                                    <p class="text-sm text-gray-600 font-light">Kepala Departemen</p>
                                </div>
                            @endif
                            
                            @if ($sekretarisDepartemen)
                                <div class="flex flex-col items-center">
                                    <img src="{{ asset('storage/' . $sekretarisDepartemen->foto) }}" alt="Foto {{ $sekretarisDepartemen->nama }}" class="w-24 h-24 rounded-full mb-2 object-cover">
                                    <h3 class="text-lg font-bold font-serif">{{ $sekretarisDepartemen->nama }}</h3>
                                    <p class="text-sm text-gray-600 font-light">Sekretaris Departemen</p>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Tampilkan Divisi dan Anggota -->
                    @foreach ($divisis as $divisi => $anggotas)
                        <div class="mb-6">
                            <h4 class="text-xl font-semibold text-indigo-800 mb-2 text-center">{{ $divisi }}</h4>

                            @php
                                $kepalaDivisi = collect($anggotas)->firstWhere('jabatan', 'Kepala Divisi');
                            @endphp

                            <!-- Tampilkan Kepala Divisi -->
                            @if ($kepalaDivisi)
                                <div class="flex flex-col items-center mb-4">
                                    <img src="{{ asset('storage/' . $kepalaDivisi->foto) }}" alt="Foto {{ $kepalaDivisi->nama }}" class="w-20 h-20 rounded-full mb-2 object-cover">
                                    <h3 class="text-lg font-bold font-serif">{{ $kepalaDivisi->nama }}</h3>
                                    <p class="text-sm text-gray-600 font-light">Kepala Divisi</p>
                                </div>
                            @endif

                            <!-- Tampilkan Anggota Divisi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($anggotas as $anggota)
                                    @if (!in_array($anggota->jabatan, ['Kepala Departemen', 'Sekretaris Departemen', 'Kepala Divisi']))
                                        <div class="bg-white p-4 rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300">
                                            <img src="{{ asset('storage/' . $anggota->foto) }}" alt="Foto {{ $anggota->nama }}" class="w-24 h-24 rounded-full mx-auto mb-4 object-cover">
                                            <h3 class="text-lg font-bold font-serif text-center">{{ $anggota->nama }}</h3>
                                            <p class="text-sm text-gray-600 font-light text-center">{{ $anggota->jabatan }}</p>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endsection
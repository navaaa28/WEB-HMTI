@extends('layouts.app')

@section('content')
<script src="//unpkg.com/alpinejs" defer></script>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Materi Perkuliahan</h2>

                {{-- Grup berdasarkan semester --}}
                @php
                    $groupedCourses = $courses->groupBy('semester')->sortKeys();
                @endphp

                <div class="space-y-8">
                    @foreach($groupedCourses as $semester => $semesterCourses)
                        <div class="border-b pb-6 last:border-b-0 last:pb-0">
                            <h3 class="text-xl font-bold text-purple-900 mb-4">
                                Semester {{ $semester }}
                            </h3>

                            <div class="grid grid-cols-1 gap-6">
                                @foreach($semesterCourses as $course)
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-shadow">
                                        <div class="p-4 border-b bg-gray-50">
                                            <div class="flex justify-between items-start">
                                                <div>
                                                    <h3 class="text-lg font-semibold text-gray-800">
                                                        {{ $course->name }}
                                                    </h3>
                                                    <p class="text-sm text-gray-600">Kode: {{ $course->code }}</p>
                                                </div>
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                    {{ $course->materials->count() }} Materi
                                                </span>
                                            </div>
                                        </div>

                                        <div class="p-4">
                                            @if($course->materials->count() > 0)
                                                <div class="divide-y">
                                                    @foreach($course->materials as $material)
                                                        <div class="py-3 flex items-center justify-between">
                                                            <div>
                                                                <h4 class="font-medium text-gray-900">{{ $material->title }}</h4>
                                                                @if($material->description)
                                                                    <p class="text-sm text-gray-600">{{ $material->description }}</p>
                                                                @endif
                                                                <div class="flex items-center space-x-2 mt-1">
                                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                                        {{ strtoupper($material->file_type) }}
                                                                    </span>
                                                                    <span class="text-xs text-gray-500">
                                                                        {{ number_format($material->file_size / 1024 / 1024, 2) }} MB
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            
                                                            <a href="{{ route('materials.download', $material) }}" 
                                                               class="inline-flex items-center px-3 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors">
                                                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                                                </svg>
                                                                Download
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @else
                                                <div class="text-center py-4">
                                                    <p class="text-gray-500">Belum ada materi untuk mata kuliah ini</p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
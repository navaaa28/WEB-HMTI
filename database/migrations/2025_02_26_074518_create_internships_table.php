<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('internships', function (Blueprint $table) {
            $table->id();
            $table->string('title');          // Judul posisi magang
            $table->string('company');        // Nama perusahaan
            $table->string('location');       // Lokasi magang
            $table->text('description');      // Deskripsi pekerjaan
            $table->text('requirements');     // Persyaratan
            $table->date('start_date');      // Tanggal mulai
            $table->date('end_date');        // Tanggal selesai
            $table->date('deadline');        // Deadline pendaftaran
            $table->string('benefits');      // Benefit yang ditawarkan
            $table->string('contact_person'); // Kontak person
            $table->string('contact_email');  // Email kontak
            $table->string('contact_phone');  // Nomor telepon kontak
            $table->string('status');         // Status (active/inactive)
            $table->string('apply_url')->nullable(); // Link pendaftaran (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internships');
    }
};

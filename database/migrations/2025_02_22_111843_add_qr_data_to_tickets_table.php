<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->text('qr_data')->nullable()->after('qr_code'); // Tambahkan kolom qr_data
        });
    }
    
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropColumn('qr_data'); // Hapus kolom qr_data
        });
    }
};

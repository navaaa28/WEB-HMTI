<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('email')->unique()->after('jabatan');
            $table->string('foto')->nullable()->after('email'); // Menyimpan path foto
        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->dropColumn(['email', 'foto']);
        });
    }
};

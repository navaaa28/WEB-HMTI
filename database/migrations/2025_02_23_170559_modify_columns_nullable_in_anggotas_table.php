<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('departemen')->nullable()->change();
            $table->string('divisi')->nullable()->change();
            $table->string('jabatan')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('anggotas', function (Blueprint $table) {
            $table->string('departemen')->nullable(false)->change();
            $table->string('divisi')->nullable(false)->change();
            $table->string('jabatan')->nullable(false)->change();
        });
    }
};

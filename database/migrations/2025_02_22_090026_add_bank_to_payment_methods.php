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
    Schema::table('payment_methods', function (Blueprint $table) {
        $table->string('bank')->after('qr_code')->nullable();
    });
}

public function down()
{
    Schema::table('payment_methods', function (Blueprint $table) {
        $table->dropColumn('bank');
    });
}

};

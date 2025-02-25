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
            $table->string('qr_code')->nullable()->after('logo');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
{
    Schema::table('payment_methods', function (Blueprint $table) {
        $table->dropColumn('qr_code');
    });
}

};

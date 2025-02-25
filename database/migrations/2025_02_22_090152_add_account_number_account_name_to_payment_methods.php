<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::table('payment_methods', function (Blueprint $table) {
        $table->string('account_number')->nullable();
        $table->string('account_name')->nullable();
    });
}

public function down()
{
    Schema::table('payment_methods', function (Blueprint $table) {
        $table->dropColumn('account_number');
        $table->dropColumn('account_name');
    });
}
};

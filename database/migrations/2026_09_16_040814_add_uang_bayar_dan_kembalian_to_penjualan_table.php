<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->decimal('uang_bayar', 12, 2)->nullable()->after('total_pembayaran');
            $table->decimal('kembalian', 12, 2)->nullable()->after('uang_bayar');
        });
    }

    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {
            $table->dropColumn(['uang_bayar', 'kembalian']);
        });
    }
};
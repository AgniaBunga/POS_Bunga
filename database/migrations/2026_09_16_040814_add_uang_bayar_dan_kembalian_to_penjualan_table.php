<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {

            $table->bigInteger('uang_bayar')
                  ->nullable()
                  ->after('total_pembayaran');

            $table->bigInteger('kembalian')
                  ->nullable()
                  ->after('uang_bayar');

        });
    }

    public function down(): void
    {
        Schema::table('penjualan', function (Blueprint $table) {

            $table->dropColumn([
                'uang_bayar',
                'kembalian'
            ]);

        });
    }
};
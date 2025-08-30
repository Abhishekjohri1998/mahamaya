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
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('wallet_address')->nullable()->after('to');
            $table->decimal('base_price_eth', 20, 8)->nullable()->after('wallet_address');
            $table->decimal('gst_amount_eth', 20, 8)->nullable()->after('base_price_eth');
            $table->decimal('total_eth_amount', 20, 8)->nullable()->after('gst_amount_eth');
            $table->decimal('gst_rate', 5, 4)->nullable()->after('total_eth_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn(['wallet_address', 'base_price_eth', 'gst_amount_eth', 'total_eth_amount', 'gst_rate']);
        });
    }
};

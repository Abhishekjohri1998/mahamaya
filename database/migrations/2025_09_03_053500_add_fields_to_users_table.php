<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable20250903053500 extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'kyc_status')) {
                $table->string('kyc_status')->default('pending')->after('email');
            }
            if (!Schema::hasColumn('users', 'wallet_address')) {
                $table->string('wallet_address')->nullable()->after('kyc_status');
            }
            if (!Schema::hasColumn('users', 'tot_tk_bal')) {
                $table->decimal('tot_tk_bal', 15, 2)->default(0)->after('wallet_address');
            }
            if (!Schema::hasColumn('users', 'dashboard_style')) {
                $table->string('dashboard_style')->default('light')->after('tot_tk_bal');
            }
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['kyc_status', 'wallet_address', 'tot_tk_bal', 'dashboard_style']);
        });
    }
}
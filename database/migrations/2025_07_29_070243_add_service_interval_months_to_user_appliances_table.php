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
        Schema::table('user_appliances', function (Blueprint $table) {
            // null = user will pick manually; otherwise auto-calc next_service_date
            $table->integer('service_interval_months')
                  ->nullable()
                  ->after('next_service_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_appliances', function (Blueprint $table) {
            $table->dropColumn('service_interval_months');
        });
    }
};

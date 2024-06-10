<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('customer_feedback', function (Blueprint $table) {
            $table->unsignedInteger('order')->default(0)->after('purchased_product');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_feedback', function (Blueprint $table) {
            $table->dropColumn('order');
        });
    }
};

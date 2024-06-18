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
        Schema::table('ads', function (Blueprint $table) {
            $table->string('axle')->nullable();

            $table->string('communication_mobile')->nullable()->change();

            $table->dropColumn(['brand', 'category', 'usage']);

            $table->unsignedBigInteger('brand_id')->nullable()->after('color');
            $table->unsignedBigInteger('category_id')->nullable()->after('state');
            $table->unsignedBigInteger('usage_id')->nullable()->after('category_id');

            $table->foreign('brand_id')->references('id')->on('land_brands')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('land_categories')->onDelete('set null');
            $table->foreign('usage_id')->references('id')->on('usages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign(['brand_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['usage_id']);

            $table->dropColumn(['axle', 'brand_id', 'category_id', 'usage_id']);

            $table->string('brand');
            $table->string('category');
            $table->string('usage');

            $table->string('communication_mobile')->nullable(false)->change();
        });
    }
};

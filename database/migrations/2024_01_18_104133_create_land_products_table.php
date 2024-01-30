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
        Schema::create('land_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->constrained('land_categories')->onDelete('cascade');
            $table->foreignId('brand_id')->constrained('land_brands')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('year')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('catalog')->nullable();
            $table->text('manual')->nullable();
            $table->text('country')->nullable();
            $table->text('colors')->nullable();
            $table->text('body')->nullable();
            $table->bigInteger('view')->default(0);
            $table->timestamps();

            $table->index(['name']); // ایندکس برای بهبود جستجو سریع
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_products');
    }
};

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
//        Schema::create('product_models', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->string('slug');
//            $table->string('model')->nullable();
//            $table->text('description')->nullable();
//            $table->longText('body')->nullable();
//            $table->string('primary_image')->nullable();
//            $table->json('slider_images')->nullable();
//            $table->string('year')->nullable();
//
//            $table->foreignId('brand_id')->constrained();
//            $table->foreignId('category_id')->nullable()->constrained();
//            $table->foreignId('company_id')->constrained();
//            $table->foreignId('usage_id')->nullable()->constrained();
//
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_models');
    }
};

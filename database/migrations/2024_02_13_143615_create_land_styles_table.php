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
        Schema::create('land_styles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->cascadeOnDelete();
            $table->integer('color')->default(1);
            $table->integer('radius')->default(0);
            $table->integer('product_type')->default(1);
            $table->integer('article_type')->default(1);
            $table->integer('video_type')->default(1);
            $table->integer('slide_type')->default(1);
            $table->integer('slide_anim')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_styles');
    }
};

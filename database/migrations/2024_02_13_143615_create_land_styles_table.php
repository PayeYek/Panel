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
            $table->integer('border_type')->default(0);
            $table->integer('product_card_type')->default(1);
            $table->integer('product_list_type')->default(1);
            $table->integer('product_striped')->default(0);
            $table->integer('article_card_type')->default(1);
            $table->integer('article_striped')->default(0);
            $table->integer('video_card_type')->default(1);
            $table->integer('category_card_type')->default(1);
            $table->integer('category_striped')->default(0);
            $table->integer('a_card_type')->default(1);
            $table->integer('a_view_type')->default(1);
            $table->integer('a_table_type')->default(1);
            $table->integer('a_striped')->default(0);
            $table->integer('slider_type')->default(1);
            $table->integer('slider_anim')->default(1);
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

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
            $table->integer('color')->default(1); // color type
            $table->integer('radius')->default(0); // border radius type
            $table->integer('border_type')->default(0); // border or shadow
            $table->integer('product_card_type')->default(1); // product card type in landing page
            $table->integer('product_list_type')->default(1); // list of articles in landing page
            $table->integer('product_striped')->default(0); // even 0r odd bg for product list in landing page
            $table->integer('article_card_type')->default(1); // even 0r odd bg for article list in landing page
            $table->integer('article_striped')->default(0);
            $table->integer('video_card_type')->default(1);
            $table->integer('category_card_type')->default(1);
            $table->integer('category_striped')->default(0);
            $table->integer('section_header_type')->default(1);
            $table->integer('contact_type')->default(1);
            $table->integer('quick_access_panel_type')->default(1);
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

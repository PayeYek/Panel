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
        Schema::create('advertises', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('primary_image')->nullable();
            $table->json('slider_images')->nullable();

            $table->boolean('agreement_price')->default(false);
            $table->string('price')->nullable();
            $table->boolean('by_installment')->default(false);
            $table->string('prepayment')->nullable();
            $table->string('installment')->nullable();
            $table->unsignedInteger('installment_count')->nullable();

            $table->boolean('exchange')->default(false);
            $table->boolean('has_chat')->default(true);

            $table->double('latitude', 10, 8)->nullable()->default(null);
            $table->double('longitude', 11, 8)->nullable()->default(null);

            $table->boolean('certified')->nullable()->default(null); //Todo define business
            $table->boolean('sponsored')->nullable()->default(null);//Todo define business
            $table->boolean('rise')->nullable()->default(null);//Todo define business
            $table->boolean('express')->nullable()->default(null);//Todo define business
            $table->json('meta')->nullable();

            $table->tinyInteger('state')->default(0); //Todo make state enum

            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained();
            $table->foreignId('city_id')->constrained('province_cities');
            $table->foreignId('usage_id')->constrained();

            $table->timestamp('published_at')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertises');
    }
};

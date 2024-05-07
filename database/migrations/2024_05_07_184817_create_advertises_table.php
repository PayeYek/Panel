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
            $table->string('primary_image');
            $table->json('slider_images');
            $table->float('price');
            $table->double('latitude', 10, 8)->nullable()->default(null);
            $table->double('longitude', 11, 8)->nullable()->default(null);

            $table->boolean('certified')->nullable()->default(null);
            $table->boolean('sponsored')->nullable()->default(null);
            $table->boolean('express')->nullable()->default(null);

            $table->float('rate')->nullable()->default(null);
            $table->tinyInteger('state')->default(0);

            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('city_id')->constrained('province_cities');

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

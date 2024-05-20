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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->string('communication_mobile');
            $table->string('primary_image');
            $table->json('slider_images')->nullable();
            $table->string('car_condition');
            $table->unsignedInteger('mileage')->nullable();
            $table->string('production_year')->nullable();
            $table->foreignId('city_id')->constrained('province_cities');
            $table->foreignId('province_id')->constrained();
            $table->string('color');
            $table->string('brand');
            $table->string('model');
            $table->string('fuel_type')->nullable();
            $table->string('engine_condition')->nullable();
            $table->string('chassis_condition')->nullable();
            $table->string('body_condition')->nullable();
            $table->string('third_party_insurance_date')->nullable();
            $table->string('gearbox_type')->nullable();
            $table->string('price');
            $table->boolean('agreement')->nullable();
            $table->string('category');
            $table->string('usage');
            $table->timestamp('published_date')->nullable();
            $table->boolean('state')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};

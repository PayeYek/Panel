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
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('communication_mobile')->nullable();
            $table->string('primary_image')->nullable();
            $table->text('slider_image')->nullable();
            $table->string('car_condition')->nullable();
            $table->unsignedInteger('mileage')->nullable();
            $table->string('year')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('engine_condition')->nullable();
            $table->string('chassis_condition')->nullable();
            $table->string('body_condition')->nullable();
            $table->string('third_party_insurance_date')->nullable();
            $table->string('gearbox_type')->nullable();
            $table->string('price')->nullable();
            $table->boolean('agreement')->nullable();
            $table->string('category')->nullable();
            $table->string('usage')->nullable();
            $table->timestamp('published_date')->nullable();
            $table->boolean('state')->nullable();
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

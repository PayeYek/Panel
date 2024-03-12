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
        Schema::create('land_agencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->cascadeOnDelete();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('province_cities')->cascadeOnDelete();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('manager')->nullable();
            $table->text('address')->nullable();
            $table->text('location')->nullable();
            $table->longText('telephones')->nullable();
            $table->longText('types')->nullable();
            $table->longText('description')->nullable(); // full text
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_agencies');
    }
};

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
        Schema::create('vertical_announces', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();

            $table->string('desktop')->nullable();
            $table->string('tablet')->nullable();
            $table->string('mobile')->nullable();

            $table->string('link')->nullable();

            $table->tinyInteger('status')->default(1); // 1: active, 0: inactive

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vertical_announces');
    }
};

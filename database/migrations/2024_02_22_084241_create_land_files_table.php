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
        Schema::create('land_files', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->string('type')->nullable();
            $table->integer('size')->nullable();
            $table->longText('path')->nullable();
            $table->longText('thumbnail')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_files');
    }
};

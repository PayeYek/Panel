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
        Schema::create('land_advertises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('land_id')->constrained()->onDelete('cascade');
            $table->text('image')->nullable();
            $table->text('alt')->nullable();
            $table->text('link')->nullable();
            $table->text('type')->default('land'); // land | product
            $table->bigInteger('view')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expired_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_advertises');
    }
};

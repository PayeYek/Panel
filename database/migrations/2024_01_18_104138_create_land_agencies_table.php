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
            $table->text('province')->nullable();
            $table->text('city')->nullable();
            $table->text('code')->nullable();
            $table->text('name')->nullable();
            $table->text('address')->nullable();
            $table->text('info')->nullable(); // call & time
            $table->text('type')->nullable();

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

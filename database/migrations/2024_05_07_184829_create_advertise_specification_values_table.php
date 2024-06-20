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
//        Schema::create('advertise_specification_values', function (Blueprint $table) {
//            $table->id();
//            $table->foreignId('advertise_id')->constrained()->onDelete('cascade');
//            $table->foreignId('specification_id')->constrained()->onDelete('cascade');
//            $table->string('value');
//            //Todo define primary key
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('advertise_specification_values');
    }
};

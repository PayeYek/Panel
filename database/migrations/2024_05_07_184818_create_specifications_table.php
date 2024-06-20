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
//        Schema::create('specifications', function (Blueprint $table) {
//            $table->id();
//            $table->string('title');
//            $table->tinyInteger('type'); //Todo implement type enum
//            $table->boolean('required')->default(false); //Todo implement type enum
//
//            $table->softDeletes();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specifications');
    }
};

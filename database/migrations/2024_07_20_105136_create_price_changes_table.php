<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('price_changes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('price_list_id')->constrained()->onDelete('cascade');
            $table->string('old_price');
            $table->string('new_price');
            $table->string('change_type'); // 'increase', 'decrease', 'no_change'
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('price_changes');
    }
};

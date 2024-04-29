<?php

use App\Enum\LandSubscribeStateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('land_subscribes', function (Blueprint $table) {
            $table->id();
            $table->string('phone');
            $table->foreignId('land_id')->constrained();
            $table->text('comment')->nullable();
            $table->string('state')->default(LandSubscribeStateEnum::PENDING);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('land_subscribes');
    }
};

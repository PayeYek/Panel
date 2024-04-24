<?php

use App\Enum\LandFacilityStateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('land_facilities', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('phone');
            $table->foreignId('land_id')->nullable()->constrained('lands')->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('land_categories')->onDelete('cascade');
            $table->string('amount');
            $table->text('comment')->nullable();
            $table->string('state')->default(LandFacilityStateEnum::PENDING)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facilities');
    }
};

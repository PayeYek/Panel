<?php

use App\Enum\AdStatisticActionEnum;
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
        Schema::create('ad_statistics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ad_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->tinyInteger('action')->default(AdStatisticActionEnum::VIEW); /* view == 0 , call == 1 */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_statistics');
    }
};

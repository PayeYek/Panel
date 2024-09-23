<?php

use App\Enum\AdvertiseStateEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('province_id')->constrained()->cascadeOnDelete();
            $table->foreignId('city_id')->constrained('province_cities')->cascadeOnDelete();

            $table->string('tracking_code');
            $table->string('title');
            $table->longText('description');
            $table->string('mobile', 10);
            $table->unsignedBigInteger('price')->default(0);

            $table->boolean('agreement')->default(false);
            $table->boolean('exchange')->default(false);
            $table->tinyInteger('state')->default(AdvertiseStateEnum::PENDING);

            $table->string('image')->nullable();
            $table->json('pictures')->nullable();

            $table->string('slug')->nullable();

            $table->softDeletes();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('type')->default('sell');
            $table->longText('description')->nullable();
            $table->longText('body')->nullable();
            $table->longText('image')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('pinned')->default(false);
            $table->text('slug')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

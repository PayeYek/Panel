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
        Schema::create('sale_notices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->longText('description')->nullable();
            $table->string('circularNo')->nullable();
            $table->longText('body')->nullable();
            $table->longText('file')->nullable();
            $table->string('file_type',8)->nullable();
            $table->longText('voice')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('pinned')->default(false);
            $table->text('slug')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->timestamp('published_at')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_notices');
    }
};

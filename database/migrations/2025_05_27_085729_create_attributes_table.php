<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('land_attributes')->cascadeOnDelete();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('land_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')->constrained('land_attributes')->cascadeOnDelete();
            $table->string('value');
            $table->timestamps();
        });

        Schema::create('land_attribute_product', function (Blueprint $table) {
            $table->foreignId('attribute_id')->constrained('land_attributes')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('land_products')->cascadeOnDelete();
            $table->foreignId('value_id')->constrained('land_attribute_values')->cascadeOnDelete();

            $table->primary(['attribute_id', 'product_id', 'value_id']);
        });

        Schema::create('land_attribute_category', function (Blueprint $table) {
            $table->foreignId('attribute_id')->constrained('land_attributes')->cascadeOnDelete();
            $table->foreignId('category_id')->constrained('land_categories')->cascadeOnDelete();

            $table->primary(['attribute_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('land_attribute_category');
        Schema::dropIfExists('land_attribute_product');
        Schema::dropIfExists('land_attribute_values');
        Schema::dropIfExists('land_attributes');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{

    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            $table->morphs('commentable');

            $table->foreignId('parent_id')->nullable()->constrained('comments')->nullOnDelete();

            $table->boolean('approved')->default(false);
            $table->unsignedTinyInteger('star')->default(5);

            $table->text('comment');

            $table->timestamps();

            // Optionally add an index for a combination of `commentable_id` and `commentable_type`
             $table->index(['commentable_id', 'commentable_type']);
        });
    }


    public function down()
    {
        Schema::dropIfExists('comments');
    }
}

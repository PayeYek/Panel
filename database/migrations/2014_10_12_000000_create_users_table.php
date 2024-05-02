<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
//            $table->id();
//            $table->string('first_name', 64)->nullable();
//            $table->string('last_name', 64)->nullable();
//            $table->tinyInteger('gender')->nullable();
//            $table->string('email')->nullable();
//            $table->string('phone', 10);
//            $table->date('birthdate')->nullable();
//            $table->tinyInteger('type')->nullable();
//            $table->string('ssn', 10)->nullable();
//            $table->timestamp('email_verified_at')->nullable();
//            $table->tinyInteger('certified')->nullable();
//            $table->tinyInteger('state')->nullable();
//
//            $table->rememberToken();
//            $table->timestamps();
//
//            $table->unique(['phone', 'ssn']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};

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
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 64)->nullable();
            $table->string('last_name', 64)->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile', 10);
            $table->date('birthdate')->nullable();
            $table->string('ssn', 10)->nullable();
            $table->string('password')->nullable();
            $table->tinyInteger('certified')->nullable()->default(0); //Todo implement Enum
            $table->tinyInteger('state')->nullable()->default(0); //Todo implement Enum\

            $table->rememberToken();
            $table->timestamp('ssn_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->unique(['mobile', 'ssn']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

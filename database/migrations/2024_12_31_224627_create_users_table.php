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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username',255)->nullable();
            $table->integer('age')->nullable();
            $table->string('tel')->nullable();
            $table->integer('zip')->nullable();
            $table->string('addr')->nullable();
            $table->string('email');
            $table->string('password');
            $table->datetime('login_time')->nullable();
            $table->string('pic')->nullable();
            $table->tinyInteger('delete_flg')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('film_user_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->index('film_id', 'ful_film_idx');
            $table->index('user_id', 'ful_user_idx');

            $table->foreign('film_id', 'ful_film_fk')->on('films')->references('id');
            $table->foreign('user_id', 'ful_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_user_likes');
    }
};

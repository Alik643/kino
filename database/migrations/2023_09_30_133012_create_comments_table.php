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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('film_id');
            $table->text('comment');
            $table->timestamps();

            $table->index('user_id', 'comments_user_idx');
            $table->index('film_id', 'comments_film_idx');

            $table->foreign('user_id', 'comments_user_fk')->on('users')->references('id');
            $table->foreign('film_id', 'comments_film_fk')->on('films')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

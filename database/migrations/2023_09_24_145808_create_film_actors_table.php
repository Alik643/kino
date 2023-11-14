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
        Schema::create('film_actors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->unsignedBigInteger('actor_id');
            $table->timestamps();

            $table->index('film_id', 'film_actor_film_idx');
            $table->index('actor_id', 'film_actor_actor_idx');
            $table->foreign('film_id', 'film_actor_film_fk')->on('films')->references('id');
            $table->foreign('actor_id', 'film_actor_actor_fk')->on('actors')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_actors');
    }
};

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
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->unsignedBigInteger('rejisor_id');
            $table->unsignedBigInteger('year');
            $table->timestamps();

            $table->index('rejisor_id', 'film_rejisor_idx');
            $table->foreign('rejisor_id', 'film_rejisor_fk')->on('rejisors')->references('id');

            $table->index('year', 'film_year_idx');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};

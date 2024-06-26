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
        Schema::create('film_writer', function (Blueprint $table) {
            $table->unsignedBigInteger('film_id')->nullable(true);
            $table->unsignedBigInteger('person_id')->nullable(true);

            $table->primary(['film_id','person_id'], 'film_person_pk');

            $table->foreign('film_id', 'film_writer_film_id_fk')->references('id')->on('films')
            ->onUpdate('no action')->onDelete('cascade');
            $table->foreign('person_id', 'film_writer_writer_id_fk')->references('id')->on('people')
            ->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('film_writer');
    }
};

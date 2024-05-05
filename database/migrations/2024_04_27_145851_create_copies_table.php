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
        Schema::create('copies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('film_id');
            $table->uuid('code')->unique();
            $table->integer('amount');
            $table->decimal('price', 4,2);
            $table->timestamps();

            $table->foreign('film_id', 'copies_film_id_fk')->references('id')->on('films')
            ->onUpdate('cascade')
            ->onDelete('cascade');  //cascade automatski se brise kopija ako obrisem film 
        


            
        });


        }

       

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};

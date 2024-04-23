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
            $table->string('name')->nullable(false);
            $table->smallInteger('year')->unsigned()->nullable(false);
            $table->smallInteger('running_h')->unsigned()->nullable(true);
            $table->smallInteger('running_m')->unsigned()->nullable(true);
            $table->decimal('rating', 3,1)->unsigned()->nullable(true);


            $table->timestamps();
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

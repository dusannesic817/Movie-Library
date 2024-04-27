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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('copy_id');
            $table->unsignedBigInteger('member_id');
            $table->integer('quantity');
            $table->date('created_at')->nullable(false);
            $table->date("to_date")->nullable(false);

            $table->foreign('copy_id', 'oreders_copy_id_fk')->references('id')->on('copies')
            ->onUpdate('cascade')
            ->onDelete('restrict');

            $table->foreign('member_id', 'oreders_member_id_fk')->references('id')->on('members')
            ->onUpdate('cascade')
            ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

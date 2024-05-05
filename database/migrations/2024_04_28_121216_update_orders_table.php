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
        
        Schema::table('orders', function (Blueprint $table) {
            $table->boolean('status')->default(1)->after('to_date'); //status da stsavim da li je i dalje aktivna, tj da li i dalje duguje film ako ne stasvim na neaktvino
          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

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
        Schema::create('security_prices', function (Blueprint $table) {
            $table->id();
            $table->float('last_price');
            $table->dateTime('as_of_date');
            $table->timestamps();
            $table->foreignId('security_id')->references('id')->on('securities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('security_prices');
    }
};

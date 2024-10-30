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
        Schema::create('reservation__prestations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestation_id')->nullable();
            $table->unsignedBigInteger('reservation_id');
            $table->integer('quantite')->nullable();

            $table->foreign('prestation_id')->references('id')->on('prestations')->onDelete('cascade');
            $table->foreign('reservation_id')->references('id')->on('reservations')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation__prestations');
    }
};

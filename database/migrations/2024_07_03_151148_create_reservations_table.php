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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('paiement_id');
            $table->string('nomCabane');
            $table->integer('nombreAdultes');
            $table->integer('nombreEnfants');
            $table->datetime('dateArrivee');
            $table->datetime('dateDepart');
            $table->integer('nombreNuitees');
            $table->decimal('prix');
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('paiement_id')->references('id')->on('paiements')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
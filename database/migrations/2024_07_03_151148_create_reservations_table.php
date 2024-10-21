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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('guest_id');
            $table->unsignedBigInteger('paiement_id')->nullable();
            $table->string('nomCabane');
            $table->integer('nombreAdultes');
            $table->integer('nombreEnfants');
            $table->datetime('dateArrivee');
            $table->datetime('dateDepart');
            $table->integer('nombreNuitees');
            $table->decimal('prix');
            $table->timestamps();


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
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

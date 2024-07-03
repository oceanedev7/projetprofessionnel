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
        Schema::create('formulaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('visiteur_id');
            $table->string('prenom');
            $table->string('nom');
            $table->string('numeroTelephone');
            $table->string('email')->unique();
            $table->text('message');
            $table->timestamps();


            $table->foreign('visiteur_id')->references('id')->on('visiteurs')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulaires');
    }
};

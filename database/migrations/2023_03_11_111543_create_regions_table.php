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
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chauffeur_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->string('lieu_depart');
            $table->string('lieu_arrive');
            $table->string('nb_kilometre');
            $table->string('prix_total');
            $table->string('montant_gagne');
            $table->string('heure_depart');
            $table->string('heure_arrive');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};

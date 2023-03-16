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
            $table->foreignId('departement_D_id')->constrained('departements');
            $table->foreignId('departement_A_id')->constrained('departements');
            $table->foreignId('region_A_id')->constrained('regions');
            $table->foreignId('region_D_id')->constrained('regions');


            $table->foreignId('chauffeur_id')->nullable()->constrained('users');
            $table->foreignId('client_id')->nullable()->constrained('users');
            
            $table->float('distance');
            $table->float('tarif');
            $table->boolean('start')->default(0);
            $table->boolean('started')->default(0);
             
        }) ;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('trajets');
    }
};

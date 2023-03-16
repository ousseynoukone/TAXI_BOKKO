<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $user = User::create([
            'prenom' => "Admin",
            'nom' => "ADMIN",
            'genre' =>'Homme',
            'email' => 'admin@admin.com',
            'password' => Hash::make('passer123'),
        ]);
        $user->attachRole('admin');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

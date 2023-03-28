<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class InsertAdminSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'prenom' => "Super",
            'nom' => "Admin",
            'genre' =>'Homme',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('passer123'),
        ]);
        $user->attachRole('superAdmin');
    }
}

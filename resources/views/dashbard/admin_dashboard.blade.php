<?php 

if (Auth::check()) {

$u  = Auth::user();
$role = $u->roles[0]['description'];

}
?>
<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Bienvenue :  $u->prenom $u->nom ") }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Statut : $role ") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container" id="myMainContainer">
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

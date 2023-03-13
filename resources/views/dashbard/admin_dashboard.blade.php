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
        <a href="{{route('regions.index')}}" class="btn  btn-dark   col-md-4 offset-8 "  style="width: 15rem; color: #fcfcfc">CRUD REGION/DEPARTMENT</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container" id="myMainContainer">
                    <div  class="text-color card-header text-color bg-warning text-white text-center">Ajouter un trajet</div>
                    <div class="row">

                                <div class="col-md-4">
                                    <div  class="text-color card-header text-white text-center">Lieu de depart</div>
                                    <div class="card-body">
                                        <select class="form-select" id="regionDepart" required aria-label="Default select example">
                                            <option value="" selected>Open this select menu</option>
                                        </select>

                                    </div>

                                </div>

                                <div class="col-md-4 offset-4">
                                    <div  class=" text-color card-header text-white text-center">Lieu de d'arrivé</div>

                                </div>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

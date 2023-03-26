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
        <a href="{{route('regions.index')}}" class="btn  btn-dark   col-md-4 offset-8 "  style="width: 15rem; color: #fcfcfc">CRUD Region/Departement</a>
        <a href="{{route('users.index')}}" class="btn  btn-dark   col-md-4 offset-8 "  style="width: 15rem; color: #fcfcfc">Les Utilisateurs</a>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container" id="myMainContainer">
                    <div  class="text-color card-header text-color  text-white text-center" style="background-color: #a35c00;""
                    >Ajouter un trajet</div>
                    <div class="row">

                                <div class="col-md-4">
                                    <div  class="text-color card-header text-white text-center" style="background-color: #a35c00">Lieu de depart</div>
                                    <div class="card-body">
                                        <form action="{{ route('trajets.store') }}" method="POST">
                                            @csrf

                                            <div class="form-group text-color">
                                                <label for="region">Sélectionnez une région :</label>
                                                <select class="form-control region" required id="region" name="regionDepart">
                                                    <option value="">--Choisir une région--</option>
                                                    @foreach ($regions as $region)
                                                    <option value="{{$region->id}}">{{$region->libelle}}</option>
                                                    @endforeach
                                                 
                                                </select>
                                            </div>
                                            <div class="form-group text-color">
                                                <label for="departement">Sélectionnez un département :</label>
                                                <select class="form-control departement" disabled id="departement" required name="departementDepart">
                                                    <option value="">--Choisir un département--</option>
           
                                                </select>
                                            </div>
                        
                                        

                                    </div>

                                </div>

                                <div class="col-md-4  offset-4">
                                    <div  class=" text-color card-header text-white text-center" style="background-color: #a35c00">Lieu de d'arrivé</div>

                                    <div class="form-group mt-3 text-color">
                                        <label for="region">Sélectionnez une région :</label>
                                        <select disabled     class="form-control region" required id="region1" name="regionArrive">
                                            <option value="">--Choisir une région--</option>
                                            @foreach ($regions as $region)
                                            <option value="{{$region->id}}">{{$region->libelle}}</option>
                                            @endforeach
                                         
                                        </select>
                                    </div>
                                    <div class="form-group text-color">
                                        <label for="departement">Sélectionnez un département :</label>
                                        <select  class="form-control departement" disabled id="departement1" required name="departementArrive">
                                            <option value="">--Choisir un département--</option>
   
                                        </select>
                                    </div>





                                </div>

                            <div class="container col-md-4 mt-1 text-color">
                                <div class="form-group ">
                                    <label for="distance">Saisir la distance en kilomètres :</label>
                                    <input type="text" required class="form-control" id="distance" name="distance" min="1" placeholder="Entrez la distance en kilomètres">
                                  </div>

                                  <div class="form-group">
                                    <label for="distance">Saisir le tarif  par Kilometre :</label>
                                    <input type="text" disabled required class="form-control" min="200" max="1000" id="tf"  placeholder="Saisir le tarif  par Kilometre ">
                                  </div>

                                  <div class="form-group">
                                    <label for="distance">Tarif : </label>
                                    <input type="text"  placeholder="Tarif en CFA" readonly required class="form-control" id="tarif" name="tarif" required>
                                  </div>
                                  
                                <button type="submit" id="stylebtn" class="btn bn-dark  mb-2 ml-2 mt-5 text-color  btn btn-dark">Ajouter ce trajet </button>
                                <a href="{{route('trajets.create')}}"  class="btn bn-dark  mb-2 ml-2 mt-5 text-color  btn btn-dark" style="float:right">Liste des trajets </a>
                          
                                </div>               

  </form>
                    </div>
                 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

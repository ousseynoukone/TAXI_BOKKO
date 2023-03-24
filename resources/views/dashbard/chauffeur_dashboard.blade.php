<?php

if (Auth::check()) {
    $u = Auth::user();
    $role = $u->roles[0]['name'];
}
?>

@php
    $checkTrajet = false;
    foreach ($tjs as     $trajet) {
        if ($trajet->chauffeur_id == $u->id && $trajet->start!=0) {
            $checkTrajet = true;
            break;
        }
    }
@endphp
<x-app-layout>

    <x-slot name="header">
        <h2 class="card-header card font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Bienvenue :  $u->prenom $u->nom ") }}
        </h2>
        <h2 class="card-header card text-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Statut : $role ") }}
        </h2>
        <h6 class="card-header text-color card text-center" >
            {{ __("Marque de la voiture :  $u->voiture") }}
        </h6>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container" id="myMainContainer1">

                    <div class="container">

                        <div class="row" id="refresh">
                            <div class="col-12">

                            </div>
                            @if (count($tjs) == 0)
                                <div class="card-header mt-4 col-md-12 text-center text-color bg-secondary"
                                    style="background-color: #a35c00 !important;">Il n'y a aucun trajet disponible
                                </div>
                            @else
                                <div class="card-header col-md-12 text-color text-center"
                                    style="background-color: #a35c00 !important;">Choisir un trajet a rouler </div>
                            @endif
                            @foreach ($tjs as $trajet)
                                <div class="col-md-7 offset-md-3 mt-2 text-color">

                                    <div class="card">
                                        <div class="card-header text-white" style="background-color: rgb(201, 80, 0)">
                                            <h5 class="card-title text-center mb-0">
                                                {{ $trajet->departement_D->libelle }}
                                                ({{ $trajet->region_D->libelle }})
                                                ----> {{ $trajet->departement_A->libelle }}
                                                ({{ $trajet->region_A->libelle }})</h5>

                                                @if($trajet->client_id && $trajet->start==0 && $trajet->chauffeur_id == $u->id )
                                                @if($trajet->started==1)
                                                <div class="card-header mt-2 badge-danger text-warning text-center" style="width: 13rem; background-color:rgb(0, 35, 133)">Client : </div>
                                                <div class="card-header">Nom complet : {{$trajet->clients->prenom." ".$trajet->clients->nom}}</div>
                                                <div class="card-header">Numero de telephone : {{$trajet->clients->tel}}</div>
                                                @else
                                                <div class="card-header mt-2 badge-danger text-warning text-center" style="width: 13rem; background-color:rgb(0, 35, 133)">Client en attente...</div>
                                                <div class="card-header">Nom complet : {{$trajet->clients->prenom." ".$trajet->clients->nom}}</div>
                                                <div class="card-header">Numero de telephone : {{$trajet->clients->tel}}</div>
                                                @endif
                                                @endif

                                                @if(( !$trajet->client_id && !$trajet->chauffeur_id == $u->id)  )
                                                <div class="card-header mt-2 badge-danger text-warning text-center" style="width: 13rem; background-color:rgb(0, 35, 133)">Pas de client </div>
   
                                                @elseif( $trajet->client_id && !$trajet->chauffeur_id == $u->id )
                                                    <div class="card-header mt-2 badge-danger text-warning text-center" style="width: 13rem; background-color:rgb(0, 35, 133)">Client en attente...</div>

                                                
                                                @endif

                                                @if(!$trajet->client_id && $trajet->chauffeur_id == $u->id)
                                                <div class="card-header mt-2 badge-danger text-warning text-center" style="width: 13rem; background-color:rgb(0, 35, 133)">Pas de client </div>

                                                @endif

                                        </div>
                                        <div class="card-body">
                                            <form method="POST" action="{{ route('chauffeurs.update', $trajet->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="region_D_id">Région de départ</label>

                                                   

                                                            <input readonly type="text" min="0.1" step="0.01"
                                                                class="form-control" id="distance" name="region_D_id"
                                                                value="{{ $trajet->region_D->libelle }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="departement_D_id">Département de départ</label>

                                                            <input readonly type="text" min="0.1" step="0.01"
                                                                class="form-control" id="distance"
                                                                name="departement_D_id"
                                                                value="{{ $trajet->departement_D->libelle }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="distance">Distance (km)</label>
                                                            <input readonly type="number" min="0.1" step="0.01"
                                                                class="form-control" id="distance" name="distance"
                                                                value="{{ $trajet->distance }}">

                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="region_A_id">Région d'arrivée</label>
                                                            <input readonly type="text"
                                                                value="{{ $trajet->region_A->libelle }}"
                                                                class="form-control" id="region_A_id"
                                                                name="region_A_id">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="departement_A_id">Département d'arrivée</label>
                                                            <input readonly type="text"
                                                                value="{{ $trajet->departement_A->libelle }}"
                                                                class="form-control" id="departement_A_id"
                                                                name="departement_A_id">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="prix">Prix (CFA)</label>
                                                            <input readonly type="text" value="{{ $trajet->tarif }}"
                                                                class="form-control" id="prix" name="tarif"
                                                                pattern="[0-9]+([,.][0-9]+)?">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    @if ($trajet->chauffeur_id == $u->id)
                                                        <div 
                                                            class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                            style="    background-color: #e95d00;
                                                    ">
                                                            Ce Course vous à  été attribuée ! </div>
                                                            @if ($trajet->start==1)
                                                            <div 
                                                            class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                            style="    background-color: #C95000;
                                                    ">
                                                            Course en cours...</div>
                                                            @elseif ($trajet->started==1 &&  $trajet->start==0 )
                                                            <div 
                                                            class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                            style="    background-color: #C95000;
                                                    ">
                                                            Course terminée ! </div>
                                                            @elseif($trajet->started==0)
                                                            <div 
                                                            class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                            style="    background-color: #C95000;
                                                    ">
                                                            Course pas encore demarrée </div>
                                                            @endif

                                                            
                                                    @elseif(!$checkTrajet)
                                                   

                                                    <button type="submit"
                                                        class="btn btn-primary mt-2 col-md-4 offset-4">Choisir</button>
                                                    @else

                                                    <div 
                                                    class="card card badge-dark text-center mt-2 col-md-7  offset-3"
                                                    style="    background-color: #c92800;
                                            "> Vous ne pouvez choisir qu'une course a la fois
                                                    </div>
                                                  @endif

                                            </form>

                                            @if ($trajet->chauffeur_id == $u->id)
                                           
                                            <form method="get" action="{{ route('chauffeurs.show', $trajet->id) }}">
                                                @if ($trajet->start!=0)
                                                    
                                            <button type="submit"
                                            class="btn btn-warning text-color mt-3  ml-3">Mettre fin</button>
                                            @endif

                                            </form>
                                          
                                            
                                            <form method="get" action="{{ route('chauffeurs.edit', $trajet->id) }}">
                                                @if ($trajet->start==0 &&  $trajet->started==0 )
                                                    
                                            <button type="submit"
                                            class="btn btn-warning text-color mt-3  ml-3">Debuter</button>

                                            @endif

                                            </form>
                                          



                                            @endif

                                        </div>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>

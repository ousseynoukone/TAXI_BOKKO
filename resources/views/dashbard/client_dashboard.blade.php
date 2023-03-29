<?php

if (Auth::check()) {
    $u = Auth::user();
    $role = $u->roles[0]['description'];
}
?>
 @php $checkIfReservedButNotStarted = false;  @endphp
 @php $checkIfReservedButStarted = false;  @endphp


@php

    
    $check = false;
    $check1 = false;
@endphp

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Bienvenue :  $u->prenom $u->nom ") }}
        </h2>
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Statut : $role ") }}
        </h2>
        <h6 class="front card-header mt-5 text-color card text-center" >
            
        </h6>
    </x-slot>
   <input type="text" hidden id="check" value="2"> 




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
  





  <!-- Modal -->
  <div class="modal fade" id="notifModal" tabindex="-1" role="dialog" aria-labelledby="notifModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header card">
          <h5 class="modal-title text-color text-center" id="notifModalLabel">Notification</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center" id="modalTitle"  >
             
        </div>

        <div class="card text-color text-center" id="modalMessage" style="font-weight: bolder">
          
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-primary text-white" data-dismiss="modal" id="btnMotal"> OK !</button>
        </div>
      </div>
    </div>
  </div>
                  <!-- Button trigger modal -->
                  <button type="button" id="notifBtnForModal" hidden class="btn btn-primary" data-toggle="modal" data-target="#notifModal">
                    
                  </button>


    <div class="container" id="myMainContainer1">



                    <div class="row ">
                        <div class="container col-md-6" style="height: 40rem; overflow-y: scroll;" >
                            @if (count($tjs) == 0)
                            <div class="front card-header mt-4 col-md-12 text-center text-color bg-secondary"
                            style="position: sticky; top: 0; z-index:1;"  >Aucun trajet disponible
                            </div>
                        @else
                            <div class="front card-header col-md-12 text-color text-center"
                            style="position: sticky; top: 0; z-index:1;" >Trajet(s) selectionée(s)</div>
                        @endif
                            <div class="container " id="Tocharge1">

                            
                       
                            @foreach ($tjs as $trajet)
                                @if ($trajet->client_id == $u->id)
                                    @php $check1 = true ; @endphp
                                    <div class="col-md-12  mt-2 text-color">

                                        <div class="card">
                                            <div class="card-header text-white"
                                                style="background-color: rgb(201, 80, 0)">
                                                <h5 class="card-title text-center mb-0">
                                                    {{ $trajet->departement_D->libelle }}
                                                    ({{ $trajet->region_D->libelle }})
                                                    ----> {{ $trajet->departement_A->libelle }}
                                                    ({{ $trajet->region_A->libelle }})</h5>

                                                @if (!$trajet->chauffeur_id)
                                                    <div class="card-header mt-2 badge-danger text-warning text-center"
                                                        style="width: 13rem; background-color:rgb(0, 35, 133)">Pas de
                                                        chauffeur</div>
                                                @elseif($trajet->client_id == $u->id)
                                                    <div class="card-header mt-2 badge-danger text-warning text-center"
                                                        style="width: 13rem; background-color:rgb(0, 35, 133)">Chauffeur
                                                        : </div>
                                                    <div class="card-header">Nom complet :
                                                        {{ $trajet->chauffeurs->prenom . ' ' . $trajet->chauffeurs->nom }}
                                                    </div>
                                                    <div class="card-header">Numero de telephone :
                                                        {{ $trajet->chauffeurs->tel }}</div>
                                                @endif

                                                @if ($trajet->chauffeur_id && !$trajet->client_id)
                                                    <div class="card-header mt-2 badge-danger text-warning text-center"
                                                        style="width: 13rem; background-color:rgb(0, 35, 133)">Chauffeur
                                                        en attente...</div>
                                                @endif

                                            </div>


                                            <div class="card-body">
                                               
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="region_D_id">Région de départ</label>

                                                                <input readonly type="text" min="0.1"
                                                                    step="0.01" class="form-control" id="distance"
                                                                    name="region_D_id"
                                                                    value="{{ $trajet->region_D->libelle }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="departement_D_id">Département de
                                                                    départ</label>

                                                                <input readonly type="text" min="0.1"
                                                                    step="0.01" class="form-control" id="distance"
                                                                    name="departement_D_id"
                                                                    value="{{ $trajet->departement_D->libelle }}">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="distance">Distance (km)</label>
                                                                <input readonly type="number" min="0.1"
                                                                    step="0.01" class="form-control" id="distance"
                                                                    name="distance" value="{{ $trajet->distance }}">

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
                                                                <label for="departement_A_id">Département
                                                                    d'arrivée</label>
                                                                <input readonly type="text"
                                                                    value="{{ $trajet->departement_A->libelle }}"
                                                                    class="form-control" id="departement_A_id"
                                                                    name="departement_A_id">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="prix">Prix (CFA)</label>
                                                                <input readonly type="text"
                                                                    value="{{ $trajet->tarif }}" class="form-control"
                                                                    id="prix" name="tarif"
                                                                    pattern="[0-9]+([,.][0-9]+)?">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row ">
                                                        @if ($trajet->client_id == $u->id)
                                                            @if ($trajet->start == 0 && $trajet->started == 0)
                                                                <div class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                                    style="    background-color: #e95d00;
                                                ">
                                                                    Course reservée </div>
                                                            @endif
                                                            @if ($trajet->start == 1)
                                                                <div class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                                    style="    background-color: #C95000;
                                                ">
                                                                    Course en cours...</div>
                                                            @elseif ($trajet->started == 1 && $trajet->start == 0)
                                                                <div class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                                    style="    background-color: #C95000;
                                                ">
                                                                    Course terminée ! </div>
                                                            @elseif($trajet->started == 0)
                                                                <div class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                                                    style="    background-color: #C95000;
                                                ">
                                                                    Course pas encore demarrée </div>
                                                            @endif
                                                        @endif

                                                <form method="get" action="{{ route('clients.edit', $trajet->id) }}">

                                                    @if ($trajet->start == 0 && $trajet->client_id == $u->id && $trajet->chauffeur_id == null)
                                                        <button type="submit"
                                                            class="btn btn-warning text-color mt-3  ml-3">Annuler</button>
                                                    @endif
                                                </form>



                                            </div>
                                        </div>
                                    </div>
                        </div>
                        @endif
                        @endforeach
                        @if ($check1 == false)
                            <div class="card-header card badge-dark text-center mt-2 col-md-6  offset-3"
                                style="    background-color: #C95000;
            ">
                                Aucune course selectionnée </div>
                        @endif
                        </div>
                    </div>

                    <div class="container col-md-6 "  style="height: 40rem; overflow-y: scroll;"    >
                        @if (count($tjs) == 0)
                        <div class="front card-header mt-4 col-md-12 text-center text-color bg-secondary"
                        style="position: sticky; top: 0; z-index:1;"  >Aucun trajet disponible
                        </div>
                    @else
                        <div class="front card-header col-md-12 text-color text-center"
                        style="position: sticky; top: 0; z-index:1;" >Liste des trajets</div>
                    @endif
                        <div class="container " id="Tocharge2">

                    
                        @foreach ($tjs as $trajet)
                            @if ($trajet->client_id != $u->id)
                                @php $check=true;  @endphp

                                <div class="col-md-12  mt-2 text-color">

                                    <div class="card">
                                        <div class="card-header text-white" style="background-color: rgb(201, 80, 0)">
                                            <h5 class="card-title text-center mb-0">
                                                {{ $trajet->departement_D->libelle }}
                                                ({{ $trajet->region_D->libelle }})
                                                ----> {{ $trajet->departement_A->libelle }}
                                                ({{ $trajet->region_A->libelle }})</h5>

                                            @if (!$trajet->chauffeur_id)
                                                <div class="card-header mt-2 badge-danger text-warning text-center"
                                                    style="width: 13rem; background-color:rgb(0, 35, 133)">Pas de
                                                    chauffeur</div>
                                            @elseif($trajet->client_id == $u->id)
                                                <div class="card-header mt-2 badge-danger text-warning text-center"
                                                    style="width: 13rem; background-color:rgb(0, 35, 133)">Chauffeur :
                                                </div>
                                                <div class="card-header">Nom complet :
                                                    {{ $trajet->chauffeurs->prenom . ' ' . $trajet->chauffeurs->nom }}
                                                </div>
                                                <div class="card-header">Numero de telephone :
                                                    {{ $trajet->chauffeurs->tel }}</div>
                                            @endif

                                            @if ($trajet->chauffeur_id && !$trajet->client_id)
                                                <div class="card-header mt-2 badge-danger text-warning text-center"
                                                    style="width: 13rem; background-color:rgb(0, 35, 133)">Chauffeur en
                                                    attente...</div>
                                            @endif

                                        </div>


                                        <div class="card-body">
                                            <form method="POST" action="{{ route('clients.update', $trajet->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="region_D_id">Région de départ</label>

                                                            <input readonly type="text" min="0.1"
                                                                step="0.01" class="form-control" id="distance"
                                                                name="region_D_id"
                                                                value="{{ $trajet->region_D->libelle }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="departement_D_id">Département de départ</label>

                                                            <input readonly type="text" min="0.1"
                                                                step="0.01" class="form-control" id="distance"
                                                                name="departement_D_id"
                                                                value="{{ $trajet->departement_D->libelle }}">

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="distance">Distance (km)</label>
                                                            <input readonly type="number" min="0.1"
                                                                step="0.01" class="form-control" id="distance"
                                                                name="distance" value="{{ $trajet->distance }}">

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
                                                            <input readonly type="text"
                                                                value="{{ $trajet->tarif }}" class="form-control"
                                                                id="prix" name="tarif"
                                                                pattern="[0-9]+([,.][0-9]+)?">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">

                                                    @foreach ($tjs as $trajet)
                                                        @if ($trajet->client_id == $u->id && $trajet->start == 1)
                                                            <div class="card card badge-dark text-center mt-2 col-md-8 offset-2"
                                                                style="background-color: #c92800;">
                                                                @php $checkIfReservedButStarted = true;  @endphp

                                                                Vous avez déjà un trajet en cours. Vous ne pouvez pas
                                                                réserver un autre trajet pour le moment.
                                                            </div>
                                                        @break

                                                    @elseif ($trajet->client_id == $u->id && $trajet->started == 0 && $trajet->start == 0)
                                                        <div class="card card badge-dark text-center mt-2 col-md-8 offset-2"
                                                            style="background-color: #c92800;">
                                                            @php $checkIfReservedButNotStarted = true;  @endphp
                                                            Vous avez déjà réservé un trajet qui n'a pas encore
                                                            démarré. Vous ne pouvez pas réserver un autre trajet
                                                            pour le moment.
                                                        </div>
                                                    @break

                                                @elseif ($trajet->client_id == $u->id && $trajet->started == 0)
                                                    <?php $checkTrajet = true; ?>
                                                @endif
                                            @endforeach

                                            @if ( $checkIfReservedButNotStarted != true &&  $checkIfReservedButStarted !=true )
                                                <button type="submit"
                                                    class="btn btn-primary mt-2 col-md-4 offset-4">Choisir</button>
                                            @endif


                                    </form>




                                </div>
                            </div>
                        </div>
                    </div>
            @endif
            @endforeach
        </div>

        </div>
    </div>
</div>
</div>
</x-app-layout>

@extends('layouts.app1')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('dashboard') }}" class="btn btn-dark mt-3 mb-2"
                    style="margin-left: 25.7% !important;">Retourner au Dashboard</a>
            </div>
            @if (count($tabAll[0])==0)
            <div class="card-header mt-4 col-md-12 text-center  bg-secondary" style="background-color: #a35c00 !important;">Il n'y a aucun trajet ! </div>
                
            @endif
            @foreach ($tabAll[0] as $trajet)
                <div class="col-md-7 offset-md-3 mt-2">
                    <div class="card">
                        <div class="card-header text-white" style="background-color: rgb(201, 80, 0)">
                            <h5 class="card-title text-center mb-0">{{ $trajet->departement_D->libelle }}
                                ({{ $trajet->region_D->libelle }})
                                ----> {{ $trajet->departement_A->libelle }}
                                ({{ $trajet->region_A->libelle }})</h5>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('trajets.update', $trajet->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="region_D_id">Région de départ</label>
                                            <select class="form-control region_D_id" disabled id="" name="region_D_id">
                                                @foreach ($tabAll[1] as $region)
                                                    <option  value="{{ $region->id }}"
                                                        {{ $trajet->region_D_id == $region->id ? 'selected' : '' }}>
                                                        {{ $region->libelle }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="departement_D_id">Département de départ</label>
                                            <select disabled class="form-control departement_D_id" id="" name="departement_D_id">
                                                @foreach ($tabAll[2] as $departement)
                                                @if ($trajet->departement_D_id == $departement->id)
                                                    
                                                  <option  selected 
                                                         value="{{ $departement->id }}" >
                                                         {{$departement->libelle}}
                                                        </option>

                                                    @endif

                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="region_A_id">Région d'arrivée</label>
                                            <select class="form-control region_A_id" disabled required id="" name="region_A_id">
                                                @foreach ($tabAll[1] as $region)
                                                    @if ($trajet->region_A_id == $region->id )

                                                    <option value="{{ $region->id }}">
                                                        {{ $region->libelle }}
                                                    </option>
                                                        
                                                    @endif
                                       

                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="departement_A_id">Département d'arrivée</label>
                                            <select disabled class="form-control departement_A_id" required id=""
                                                name="departement_A_id">
                                                @foreach ($tabAll[2] as $departement)
                                                @if ($trajet->departement_A_id == $departement->id )

                                                <option value="{{ $departement->id }}">

                                                       {{ $departement->libelle }}
                                                    
                                                </option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="chauffeur_id">Chauffeur</label>
                                            <input readonly type="text"
                                                value="{{($trajet->chauffeurs)?  $trajet->chauffeurs->prenom ." ".$trajet->chauffeurs->nom : "Pas de chauffeur attribué"}}"
                                                class="form-control" id=""
                                                name="">

                                        </div>
                                              
                                        <div class="form-group">
                                            <label for="client_id">Client</label>
                                            <input readonly type="text"
                                            value="{{($trajet->clients)?  $trajet->clients->prenom ." ".$trajet->clients->nom : "Pas de client "}}"
                                            class="form-control" id=""
                                                name="">

                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="distance">Distance (km)</label>
                                            <input type="number" min="0.1" step="0.01" class="form-control" id="" name="distance" value="{{ $trajet->distance }}">

                                        </div>
                                  
                                            


                           
                                        <div class="form-group">
                                            <label for="prix">Prix (CFA)</label>
                                            <input type="text" value="{{ $trajet->tarif }}" class="form-control"
                                                id="" name="tarif" pattern="[0-9]+([,.][0-9]+)?">
                                        </div>
                                            


                                    </div>
                                </div>
                                <div class="row ">
                                <button type="button" data-toggle="modal" onclick="loadTrajet({{$trajet->id}})" data-target="#modifTrajet" class="btn btn-primary mt-2">Modifier</button>

                            </form>
                            <form method="POST" action="{{ route('trajets.destroy',['trajet'=>$trajet->id]) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger mt-2 ml-4">Supprimer</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>











  <!-- Modal -->
  <div class="modal fade" id="modifTrajet" tabindex="-1" role="dialog" aria-labelledby="modifTrajetLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header " style="background-color: rgb(201, 80, 0);">
          <h5 class="modal-title text-center" id="exampleModalLabel" >Modifier le trajet</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body card">


            
            <form method="POST" id="modifTrajetForm" action="{{ route('trajets.update', $trajet->id) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="region_D_id">Région de départ</label>
                            <select class="form-control region_D_id"  required id="region_D_id" name="region_D_id">
            
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departement_D_id">Département de départ</label>
                            <select class="form-control departement_D_id" id="departement_D_id" required name="departement_D_id">
                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="region_A_id">Région d'arrivée</label>
                            <select class="form-control region_A_id"  required id="region_A_id" name="region_A_id">

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="departement_A_id">Département d'arrivée</label>
                            <select class="form-control departement_A" required id="departement_A_id"
                                name="departement_A_id"> >
                            </select>
                        </div>

                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="chauffeur_id">Chauffeur</label>
                            <input readonly type="text" required value="" class="form-control" id="chauffeur">

                        </div>
                              
                        <div class="form-group">
                            <label for="client_id">Client</label>
                            <input readonly type="text" required   value="" class="form-control" id="client" name="">

                        </div>
                        
                        <div class="form-group">
                            <label for="distance">Distance (km)</label>
                            <input type="number" required    min="0.1" step="0.01" class="form-control" id="distance" name="distance" value="">

                        </div>
                  
                            


           
                        <div class="form-group">
                            <label for="prix">Prix (CFA)</label>
                            <input type="text" value="" class="form-control" id="tarif"  >
                        </div>
                            


                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Fermer</button>
                    <button type="submit" id="submitBtn" class="btn btn-dark">Sauvegarder</button>

                  </div>
                </form>
   

          


        </div>

      </div>
    </div>
  </div>




@endsection

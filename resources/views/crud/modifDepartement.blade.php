@extends('layouts.app1')
@section('content')  
<div class="container col-md-6">   
  <div class="card">
    <div class="card-header text-center bg-dark text-white">Editer</div>
    <form method="POST" action="{{ route('departements.update', ['departement' => $All[0]]) }}">
      @csrf
          @method('PUT')
      
          <div class="form-group">
              <label for="libelle" class="text-color">Libelle:</label>
              <input type="text" class="form-control" required id="libelleRegion" value="{{$All[0]->libelle}}" name="libelle" >
          </div>

          <label for="libelle" class="text-color">Region</label>
          <select class="form-select form-group"  required name="region_id" aria-label="Default select example">
  
              <option value="{{$All[0]->regions->id}}" selected> {{$All[0]->regions->libelle}}</option>
              @foreach ($All[1] as $region )
                 @if($region->id != $All[0]->regions->id )
                  
                  <option value="{{$region->id}}">{{$region->libelle}}</option>
                @endif
              @endforeach
  
          </select>
      
          <button type="submit"   class="btn bg-dark btn-danger col-md-4 offset-4 mb-3">Enregistrer</button>

       </form>
  </div>
</div>

@endsection
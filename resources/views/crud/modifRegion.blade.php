@extends('layouts.app1')
@section('content')  
<div class="container col-md-6">   
  <div class="card">
    <div class="card-header text-center bg-dark text-white">Editer</div>
    <form method="POST" action="{{ route('regions.update', ['region' => $reg->id]) }}">
      @csrf
          @method('PUT')
      
          <div class="form-group">
              <label for="libelle" class="text-white">Libelle:</label>
              <input type="text" class="form-control" id="libelleRegion" value="{{$reg->libelle}}" name="libelle" >
          </div>
      
          <button type="submit"   class="btn bg-dark btn-danger col-md-4 offset-4 mb-3">Enregistrer</button>

       </form>
  </div>
</div>

@endsection
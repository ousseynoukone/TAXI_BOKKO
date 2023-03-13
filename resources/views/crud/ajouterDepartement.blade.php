@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="card col-md-6 mt-4 offset-3">
        <h6 class="card-header text-white bg-dark text-center">Ajouter un departement</h6>

    <form method="POST" action="{{ route('departements.store') }}">
        @csrf

        <div class="form-group mt-1">
            <label for="libelle" class="text-color">Libellé</label>
            <input type="text" required class="form-control" id="libelle" name="libelle" required>
        </div>

        <label for="libelle" class="text-color">Region</label>
        <select class="form-select form-group" required name="region_id" aria-label="Default select example">

            <option value="" selected>Choisir une region</option>
            @foreach ($All[0] as $region )
                
                <option value="{{$region->id}}">{{$region->libelle}}</option>

            @endforeach

        </select>



        <button type="submit" class="btn btn-dark col-md-6 offset-3  ">Ajouter</button>

        <a href="{{route('regions.index')}}" class="btn btn-dark col-md-6 mt-2 offset-3 mb-2">Liste des regions</a>
    </form>

    
</div>



<table class="table table-dark mt-5">
    <thead>
      <tr>
        <th scope="col">#ID</th>
        <th scope="col">Departement(s)</th>
        <th scope="col">Operations</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($All[1] as $departement )
        
        <tr>
        <td>{{$departement->id}}</td>
        <td>{{$departement->libelle}}</td>


        <form method="POST" action="{{ route('departements.destroy',['departement'=>$departement->id]) }}" accept-charset="UTF-8" style="display:inline">
          {{ method_field('DELETE') }}
          {{ csrf_field() }}
          <td>
            <button  class="btn btn-danger">x</button>
            <a href="{{route('departements.edit',['departement'=>$departement->id])}}" class="btn btn-secondary">éditer</a>

          </td>
        </form>
        </tr>

        @endforeach




    </tbody>
  </table>
</div>



@endsection

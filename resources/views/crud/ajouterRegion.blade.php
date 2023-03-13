@extends('layouts.app1')
@section('content')
<div class="container">
    <div class="card col-md-6 mt-4 offset-3">
        <h6 class="card-header text-white bg-dark text-center">Ajouter une région</h6>

    <form method="POST" action="{{ route('regions.store') }}">
        @csrf

        <div class="form-group mt-1">
            <label for="libelle">Libellé</label>
            <input type="text" required class="form-control" id="libelle" name="libelle" required>
        </div>

        <button type="submit" class="btn btn-dark col-md-6 offset-3  ">Ajouter</button>
        <a href="{{route('regions.index')}}" class="btn btn-dark col-md-6 mt-2 offset-3 mb-2">Liste des regions</a>
    </form>
</div>
</div>


@endsection
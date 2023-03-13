@extends('layouts.app1')
@section('content')




    <div class="container mt-5">
        <a href="{{route('regions.create')}}" class="btn btn-dark">Ajouter une region</a>
        <a href="{{route('departements.create')}}" class="btn btn-dark">Ajouter ou Gerer les departement</a>
        <a href="{{route('dashboard')}}" class="btn btn-dark col-md-3 offset-2 " >Retouner au Dashboard</a>
        <table class="table table-dark mt-2">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Region</th>
                <th scope="col">Departement(s)</th>
                <th scope="col">Operations</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($All as $region )
                <tr>

                <td>{{$region->id}}</td>
                <td>{{$region->libelle}}</td>
                @foreach ($region->departements as $departement )
                
                <td class="card">
                    {{$departement->libelle}}

                </td> 

                    
                @endforeach
                @if (count($region->departements)==0)
                <td></td>
                <form method="POST" action="{{ route('regions.destroy',['region'=>$region->id]) }}" accept-charset="UTF-8" style="display:inline">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <td>
                    <button  class="btn btn-danger">x</button>
                    <a href="{{route('regions.edit',['region'=>$region->id])}}" class="btn btn-secondary">éditer</a>

                  </td>
                </form>
                  
                @else
                <form method="POST" action="{{ route('regions.destroy',['region'=>$region->id]) }}" accept-charset="UTF-8" style="display:inline">
                  {{ method_field('DELETE') }}
                  {{ csrf_field() }}
                  <td>
                    <button  class="btn btn-danger">x</button>
                    <a href="{{route('regions.edit',['region'=>$region->id])}}" class="btn btn-secondary">éditer</a>
                  
                  </td>

                </form>
                @endif
            </tr>

                @endforeach

    
       

            </tbody>
          </table>
    </div>
@endsection
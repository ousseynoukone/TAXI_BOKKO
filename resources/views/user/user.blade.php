@extends('layouts.app1')

@section('content')
    <div class="container  mt-5">
        <a href="{{ route('dashboard') }}" class="btn  btn-dark   col-md-4 offset-8 "
            style="width: 15rem; color: #fcfcfc">Retourner au Dashboard</a>

        <div class="col-md-12 mt-4 " style="height: 10rem; overflow: auto;">
            <div class="card">
                <div class="card-header h5"> Clients </div>
                <table class="table">
                    @if(!count($tabAll[0]))
                    <div class="card-header h6 text-center">Aucun client</div>
                    @endif
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th> Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tabAll[0] as $client)
                            <tr>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->nom }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->tel }}</td>
                                <td>
                                    <form method="POST" action="{{ route('users.destroy', ['user' => $client->id]) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn  btn-danger "
                                            style="background-color:red !important;">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 mt-4 " style="height: 10rem; overflow: auto;">
            <div class="card">
                <div class="card-header h5">Chauffeurs</div>
                <table class="table">
                    @if(!count($tabAll[2]))
                    <div class="card-header h6 text-center">Aucun chauffeur</div>
                    @endif
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Telephone</th>
                            <th>Modele du voiture</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tabAll[2] as $chauffeur)
                            <tr>
                                <td>{{ $chauffeur->prenom }}</td>
                                <td>{{ $chauffeur->nom }}</td>
                                <td>{{ $chauffeur->email }}</td>
                                <td>{{ $chauffeur->tel }}</td>
                                <td>{{ $chauffeur->voiture }}</td>
                                <td>
                                    <form method="POST" action="{{ route('users.destroy', ['user' => $chauffeur->id]) }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn  btn-danger "
                                            style="background-color:red !important;">Supprimer</button>
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-12 mt-4 " style="height: 10rem; overflow: auto;">
            <div class="card">

                <div class="card-header h5">Administrateurs</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tabAll[1] as $admin)
                            <tr>
                                <td>{{ $admin->prenom }}</td>
                                <td>{{ $admin->nom }}</td>
                                <td>{{ $admin->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection

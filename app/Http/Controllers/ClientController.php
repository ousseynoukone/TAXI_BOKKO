<?php

namespace App\Http\Controllers;

use App\Models\Trajets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $u = Auth::user();
        $trajets = Trajets::orderBy('start', 'desc')->orderBy('started', 'asc')->get();
        $tjs = array();
    
        foreach ($trajets as $trajet) {
            if (!$trajet->client_id || ($u && $trajet->client_id == $u->id)) {
                array_push($tjs, $trajet);
            }
        };


    
        return view('dashbard.client_dashboard', compact('tjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tr = Trajets::all();
        $trajets = [];
        foreach ($tr as $t ) {
            $trajet = new Trajets();

            $trajet->departement_A =  $t->departement_A->libelle;
            $trajet->departement_D =  $t->departement_D->libelle;
            $trajet->region_A =  $t->region_A->libelle;
            $trajet->region_D =  $t->region_D->libelle;
            $trajet->clients =  $t->clients;
            $trajet->chauffeurs =  $t->chauffeurs;
            $trajet->tarif =  $t->tarif;
            $trajet->distance =  $t->distance;
            $trajet->departement_A_id =  $t->departement_A_id;
            $trajet->departement_D_id =  $t->departement_D_id;
            $trajet->region_A_id =  $t->region_A_id;
            $trajet->region_D_id =  $t->region_D_id;
            $trajet->start =  $t->start;  
            $trajet->started =  $t->started;  
            $trajet->id =  $t->id;  
            $trajet->endnotif =  $t->endnotif;  
            $trajet->client_id =  $t->client_id;  
            $trajet->chauffeur_id =  $t->chauffeur_id;  
            $trajets [] = $trajet;    
          }
    

        return [$trajets,Auth::user()];

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $t = Trajets::find($id);
        $t->endnotif=1;
        $t->update();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $u = Auth::user();
        

        $trajet = Trajets::find($id);

        $trajet->client_id = null ;

        $trajet->update();
        toastr()->warning('Course annulée ! ', 'Succès !');

        return (redirect()->route('clients.index'));    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $u = Auth::user();
        

        $trajet = Trajets::find($id);

        $trajet->client_id = $u->id;

        $trajet->update();
        toastr()->success('Course reservée ! ', 'Succès !');

        return (redirect()->route('clients.index'));    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

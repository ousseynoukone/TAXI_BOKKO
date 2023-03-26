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
        //
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

<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Region;
use App\Models\Trajets;
use Illuminate\Http\Request;

class TrajetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return( Region::with(['departements'] )->get());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {




        $tabAll = [
            Trajets::all(),
            Region::all(),
            Departement::all()
        ];
        return(view('crud.trajet_crud.listTrajet',compact('tabAll')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tr = new Trajets();


        $tr->departement_D_id = $request->get('departementDepart') ;
        $tr->region_D_id = $request->get('regionDepart') ;
        $tr->departement_A_id = $request->get('departementArrive') ;
        $tr->region_A_id = $request->get('regionArrive') ;
        $tr->distance = $request->get('distance') ;
        $tr->tarif = $request->get('tarif') ;
        $tr->save();
        toastr()->success('Trajet ajouté ! ', 'Succès !');
        return redirect()->route('dashboard');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $trajet = new Trajets();
        $t = Trajets::find($id);
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
        $trajet->id =  $t->id;
        $tabAll = [
            Region::all(),
            Departement::all(),
            $trajet
        ];
        
        
    
        return($tabAll) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $trajet = Trajets::findOrFail($id);
    
        $region_A_id = $request->get('region_A_id');
    
        $region_D_id = $request->get('region_D_id');
        
    

    
        $departement_A_id = $request->get('departement_A_id');
        $departement_D_id = $request->get('departement_D_id');
        if ($departement_D_id == $departement_A_id) {
            toastr()->error("Le departement de départ et le departement d'arrivé ne peuvent pas être identiques", 'Erreur !');
            return redirect()->back();
        }
    
        $region_departement_A = Departement::findOrFail($departement_A_id)->region_id;
        if ($region_departement_A != $region_A_id) {
            toastr()->error("Le département d'arrivée n'appartient pas à la région d'arrivée sélectionnée", 'Erreur !');
            return redirect()->back();
        }
    
        $region_departement_D = Departement::findOrFail($departement_D_id)->region_id;
        if ($region_departement_D != $region_D_id) {
            toastr()->error("Le département de départ n'appartient pas à la région de départ sélectionnée", 'Erreur !');

            return redirect()->back();
        }
    
        $trajet->update($request->all());
        toastr()->success("Trajet modifié ! ", 'Succès !');
    
        return redirect()->route('trajets.create');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $trajet = Trajets::findOrFail($id);
        $trajet->delete();

        toastr()->warning("Trajet supprimé  ! ", 'Sucess !');

        return redirect()->route('trajets.create');

    }
}

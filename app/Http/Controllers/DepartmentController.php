<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Department;
use App\Models\Region;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $All = [
            Region::all(),
            Departement::all()

        ];
        return (view('crud.ajouterDepartement',compact('All')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {  
        $departement = new Departement();  
        $departement->libelle = $request->get('libelle'); 
        $departement->region_id = $request->get('region_id'); 
        $departement->save();
        toastr()->success('Departement ajouté avec sucess ! ','SUCESS');

        return(redirect()->route('departements.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show( $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $department)
    {
        $All = [
            Departement::find($department),
            Region::all(),

        ];
        return (view('crud.modifDepartement',compact('All')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $department = Departement::find($id);
        $department->fill($request->all());
        $department->save();
        toastr()->success('Mise à jour effectuée', 'Succès !');
        return redirect()->route('departements.create');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $department)
    {
        $departement = Departement::find($department);
        $departement->delete(); // delete the parent record
        toastr()->warning('Departement supprimée ! ','SUCESS');
        return redirect()->route('departements.create');

    }
}

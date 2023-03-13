<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $All = Region::all();
        
        return(view('crud.crud',compact('All')) );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crud.ajouterRegion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Region::create($request->all());

        toastr()->success('Region ajoutée avec sucess ! ','sucess ! ');
        

        return(view('crud.ajouterRegion'));
       
    }

    /**
     * Display the specified resource.
     */
    public function show( $region)
    {
        return Region::find($region);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($region  )
    {
        $reg =  Region::find($region);
        return (view('crud.modifRegion',compact('reg')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Region $region)
    {
        $region->fill($request->all());
        $region->save();
        toastr()->success('Mise à jour effectuée', 'Succès !');
        return redirect()->route('regions.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $region = Region::find($id);
        $region->departements()->delete(); // delete the child records
        $region->delete(); // delete the parent record
        toastr()->error('Region supprimée ! ','sucess ! ');
        return redirect()->route('regions.index');




    }
}

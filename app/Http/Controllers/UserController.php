<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $u = User::all();
        $tabClient = array();
        $tabAdmin = array();
        $tabSuperAdmin = array();
        $tabChauffeur = array();
        
        foreach ($u  as $utilisateur) {
            if ($utilisateur->hasrole('admin')) {
                $tabAdmin[] = $utilisateur;
            } 

            if ($utilisateur->hasRole('chauffeur')) {
                $tabChauffeur[] = $utilisateur;
            } 

            if ($utilisateur->hasRole('client')) {
                $tabClient[] = $utilisateur;
            }

            if ($utilisateur->hasRole('superAdmin')) {
                $tabSuperAdmin[] = $utilisateur;

            }
            
        }
        $tabAll = [
            $tabClient,
            $tabAdmin,
            $tabChauffeur,
            $tabSuperAdmin
        ];
     
        
        
    
        return view('user.user', compact('tabAll'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        toastr()->success("Utilisateur supprimé ! ", 'Success !');
        return redirect()->route('users.index');
    }
}

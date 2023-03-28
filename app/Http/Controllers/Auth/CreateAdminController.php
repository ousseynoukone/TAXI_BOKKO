<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class CreateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return(view('auth.registerAdmin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
           
   
            $request->validate([
                'prenom' => ['required', 'string', 'max:255'],
                'nom' => ['required', 'string', 'max:255'],
                'genre' => ['required', 'string', 'max:10'],
                'age' => ['required', 'integer'],
                'tel' => ['required', 'string', 'max:14'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
            ]);

        

        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'age' => $request->age,
            'genre' => $request->genre,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->attachRole('admin'); 

    //    event(new Registered($user));

    //    Auth::login($user);

        toastr()->success('Compte Admin crée avec success ! ', 'Succès !');

        return redirect()->route('dashboard');
        
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
        //
    }
}

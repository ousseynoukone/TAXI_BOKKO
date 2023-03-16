<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Support\Facades\Auth;
use Laratrust\Traits\LaratrustUserTrait;


use Illuminate\Http\Request;
class DashboardController extends Controller
{
    public  function index()
    { 
        if(Auth::user()->hasRole('client')){
            return view('dashbard.client_dashboard');
        }
        
        else if(Auth::user()->hasRole('chauffeur'))
        {

            return redirect()->route('chauffeurs.index');

        }
        
        else if (Auth::user()->hasRole('admin'))
        {
            $regions = Region::all(); 
            return view('dashbard.admin_dashboard',compact('regions'));

        }
    }
    
}

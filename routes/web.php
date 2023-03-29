<?php

use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CreateAdminController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
});


Route::group(['middleware' => ['auth', 'role:admin|superAdmin']], function() { 
    Route::resource('trajets',TrajetController::class);
    Route::resource('departements',DepartmentController::class);
    Route::resource('regions',RegionController::class);
    Route::resource('js',JsController::class);
    Route::resource('users',UserController::class);
    
});



Route::group(['middleware' => ['auth','role:superAdmin']], function() { 
 
    Route::resource('admins', 'App\Http\Controllers\Auth\CreateAdminController');
});



Route::group(['middleware' => ['auth','role:chauffeur']], function() { 
    Route::resource('chauffeurs',ChauffeurController::class);

});

Route::group(['middleware' => ['auth','role:client']], function() { 
    Route::resource('clients',ClientController::class);

});



/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

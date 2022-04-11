<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PropertyOwnerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CityController;
use App\Models\Uf;
use App\Models\City;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Rotas de registro
Route::post('/user/register', [UserController::class, 'register']);
Route::post('/user/getAccessToken', [UserController::class, 'getAccessToken']);

//Rodas Estados e Cidades
Route::get('/uf', function() {
    return Uf::all();
});

Route::get('/city/{uf_id?}', [CityController::class, 'index']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:sanctum')->group(function(){

    Route::controller(CompanyController::class)->group(function () {
        Route::post('/company/create', 'create');
        Route::put('/company/update', 'update');
        Route::delete('/company/delete', 'delete');
        Route::get('/company/show/{name?}/{cnpj?}/{orderBy?}/{pg?}', 'index');
    });

    Route::controller(PropertyController::class)->group(function () {
        Route::post('/property/create', 'create');
        Route::put('/property/update', 'update');
        Route::delete('/property/delete', 'delete');
        Route::get('/property/show/{name?}/{district?}/{orderBy?}/{pg?}', 'index');
    });

    Route::controller(PropertyOwnerController::class)->group(function () {
        Route::post('/propertyOwner/create', 'create');
        Route::put('/propertyOwner/update', 'update');
        Route::delete('/propertyOwner/delete', 'delete');
        Route::get('/propertyOwner/show/{name?}/{cpf?}/{orderBy?}/{pg?}', 'index');
    });

    // Route::post('/propertyOwner/create', [PropertyOwnerController::class, 'create']);
    // Route::put('/propertyOwner/update', [PropertyOwnerController::class, 'update']);
    // Route::delete('/propertyOwner/delete', [PropertyOwnerController::class, 'delete']);
    // Route::get('/propertyOwner', function() {
    //     return PropertyOwner::with(['propertys'])->get();
    // });

    
});

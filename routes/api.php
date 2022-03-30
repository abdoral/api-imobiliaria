<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PropertyOwnerController;
use App\Models\Company;
use App\Models\PropertyOwner;

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

Route::post('/user/register', [UserController::class, 'register']);

Route::post('/user/getAccessToken', [UserController::class, 'getAccessToken']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/company/create', [CompanyController::class, 'create']);
    Route::put('/company/update', [CompanyController::class, 'update']);
    Route::delete('/company/delete', [CompanyController::class, 'delete']);
    Route::get('/company', function() {
        return Company::all();
    });

    Route::post('/propertyOwner/create', [PropertyOwnerController::class, 'create']);
    Route::put('/propertyOwner/update', [PropertyOwnerController::class, 'update']);
    Route::delete('/propertyOwner/delete', [PropertyOwnerController::class, 'delete']);
    Route::get('/propertyOwner', function() {
        return PropertyOwner::all();
    });
});

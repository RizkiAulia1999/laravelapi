<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\ProgramController;

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
//Api route for register new user
Route::post('/register',[AuthController::class,'register']);
//Api route for login user
Route::post('/login',[AuthController::class,'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']],function(){
    Route::get('/profile',function(Request $request){
        return auth()->user();
    });
    Route::resource('programs',ProgramController::class);
    //API route for logout user
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

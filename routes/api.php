<?php
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::apiResource('points', 'PointsController');
// Route::put('points', 'PointsController@update');
// Route::get('/public/api/points', 'PointsController@index');


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

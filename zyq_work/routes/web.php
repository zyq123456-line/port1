<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');

});
Route::post('/clue/create',[\App\Http\Controllers\clueController::class,'createClue']);
Route::post('/clue/delete',[\App\Http\Controllers\clueController::class,'delectClue']);
Route::post('/clue/update',[\App\Http\Controllers\clueController::class,'updateClue']);
Route::get('/clue/list', function () {
    return App\Models\clue::paginate();
});
Route::post('/clue/selectBycmustoer',[\App\Http\Controllers\clueController::class,'selectClue']);
Route::post('/administrator',[\App\Http\Controllers\administratorController::class,'administratorRegister']);

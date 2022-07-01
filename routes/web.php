<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;


Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::get('/', function () {return view('dashboard');})->middleware('auth');


Route::get('/data', [DataUserController::class, 'index']);
Route::get('/add',  [DataUserController::class, 'add']);
Route::post('/add', [DataUserController::class, 'create']);

Route::get('/edit', [DataUserController::class, 'edit']);
Route::post('/edit', [DataUserController::class, 'update']);

Route::get('/delete',[DataUserController::class,'delete']);
Route::post('/delete',[DataUserController::class,'remove']);

Route::group(['middleware' => ['auth']], function() {
    Route::get('user/index', 'DataUserController@index')->name('user/index');
    Route::get('user/show/{id}', 'DataUserController@show')->name('user/show');
});


Route::group(['middleware' => 'auth'], function() {
    Route::post('/workstart', 'TimestampController@workstart')->name('timestamp/workstart');
    Route::post('/workend', 'TimestampController@workend')->name('timestamp/workend');
});



require __DIR__.'/auth.php';

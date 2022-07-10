<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\TimestampController;
use App\Http\Controllers\RestController;


Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth'])->name('dashboard');
Route::get('/', function () {return view('dashboard');})->middleware('auth');


Route::post('/Timestamp/start', [TimestampController::class, 'start'])->name('Timestamp.start');
Route::post('/Timestamp/end', [TimestampController::class, 'end'])->name('Timestamp.end');
Route::get('/date', [TimestampController::class, 'index'])->name('Timestamp.date');

Route::post('/rest/start', [RestController::class, 'start'])->name('rest.start');
Route::post('/rest/end', [RestController::class, 'end'])->name('rest.end');




require __DIR__.'/auth.php';

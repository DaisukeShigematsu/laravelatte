<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\RestController;

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

// Route::get('/', function () { return view('welcome');});
//  Route::get('/dashboard', function () { return view('dashboard'); })->middleware(['auth'])->name('dashboard');
require __DIR__.'/auth.php';

// Route::get('/', [StampController::class, 'index'])->middleware(['auth'])->name('stamp.index');
// Route::get('/', [StampController::class, 'index'])->name('stamp.index');

Route::middleware(['auth'])->group(function() {
    Route::get('/', [StampController::class, 'index'])->name('stamp.index');

    Route::post('/attendance/start', [AttendanceController::class, 'start'])->name('attendance.start');
    Route::post('/attendance/end', [AttendanceController::class, 'end'])->name('attendance.end');
    Route::get('/date', [AttendanceController::class, 'index'])->name('attendance.date');

    Route::post('/rest/start', [RestController::class, 'start'])->name('rest.start');
    Route::post('/rest/end', [RestController::class, 'end'])->name('rest.end');
});


// 未認証の時はAuthenticate.phpが呼ばれる。
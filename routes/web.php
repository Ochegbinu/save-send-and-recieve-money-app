<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepositController;
use App\Http\Controllers\TransferController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/deposit', [DepositController::class, 'index'])->name('save');

Route::post('/deposit', [DepositController::class, 'store'])->name('depot');

Route::get('/transfer', [TransferController::class, 'show'])->name('send');

Route::post('/transfer', [TransferController::class, 'shear'])->name('gift');

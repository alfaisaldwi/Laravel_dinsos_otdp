<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataOtdpController;
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
    return view('layouts.master');
});

Route::resource('data_otdp',DataOtdpController::class);
Route::resource('create_data_otdp',DataOtdpController::class);
Route::get('/layouts/data_otdp/create_data_otdp', [DataOtdpController::class, 'create'])->name('layouts.data_otdp.create_data_otdp');
Route::post('/tambah-data-otdp', [DataOtdpController::class, 'postcreate'])->name('data_otdp.postcreate');

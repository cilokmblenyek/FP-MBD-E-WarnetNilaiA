<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FnBController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\controller_pegawai;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\WarnetSystemController;
use App\Http\Controllers\CashierTransactionController;


Route::get('/', function () {
    return view('home', [
        "title" => 'Warnet Nilai A', 
        "name" => 'Kelompok GIF',
        "position" => 'RUMAH',
    ]);
});

Route::get('/pegawai', [controller_pegawai::class, 'index']);
//single post pegawai
Route::get('/pegawai/{id}', [controller_pegawai::class, 'show_detail']);

Route::get('/warnetsystem', [WarnetSystemController::class, 'index']);
Route::get('/warnetsystem/create', [WarnetSystemController::class, 'create']);
Route::post('/warnetsystem', [WarnetSystemController::class, 'store']);
Route::get('/warnetsystem/{id}', [WarnetSystemController::class, 'show_detail']);

Route::get('/membership', [MembershipController::class, 'index']);
Route::get('/membership/{id}', [MembershipController::class, 'show_detail']);

Route::get('/fnb', [FnBController::class, 'index']);
Route::get('/fnb/create', [FnBController::class, 'create']);
Route::post('/fnb', [FnBController::class, 'store']);
Route::get('/fnb/{id}', [FnBController::class, 'show_detail']);

Route::get('/komputer', [ComputerController::class, 'index']);
Route::get('/komputer/create', [ComputerController::class, 'create']);
Route::post('/komputer', [ComputerController::class, 'store']);
Route::get('/komputer/{id}', [ComputerController::class, 'show_detail']);

Route::get('/cashiertransaction', [CashierTransactionController::class, 'index']);
Route::get('/cashiertransaction/create', [CashierTransactionController::class, 'create']);
Route::post('/cashiertransaction', [CashierTransactionController::class, 'store']);
Route::get('/cashiertransaction/{id}', [CashierTransactionController::class, 'show_detail']);
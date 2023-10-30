<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\UserSystemController;

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


Route::get('/login', [AuthenticateController::class, 'index'])->name('login');
Route::post('/login/auth', [AuthenticateController::class, 'authenticate']);
Route::post('/logout', [AuthenticateController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('dashboard.index');
    });
    Route::get('/data/barang', [BarangController::class, 'index']);
    Route::post('/data/barang/create', [BarangController::class, 'store']);
    Route::delete('/data/barang/{id}/delete', [BarangController::class, 'destroy']);
    Route::get('/data/pelanggan', [PelangganController::class, 'index']);
    Route::post('/data/pelanggan/create', [PelangganController::class, 'store']);
    Route::delete('/data/pelanggan/{id}/delete', [PelangganController::class, 'destroy']);
    Route::get('/data/penjualan', [PenjualanController::class, 'index']);
    Route::get('/data/penjualan/{id}/show', [PenjualanController::class, 'show']);
    Route::post('/data/penjualan/create', [PenjualanController::class, 'store']);
    Route::get('/data/penjualan/{id}/generate-pdf', [PenjualanController::class, 'generatePDF']);
    Route::get('/data/delivery', [DeliveryController::class, 'index']);
    Route::post('/data/delivery/create', [DeliveryController::class, 'store']);
    Route::get('/data/delivery/{id}/show', [DeliveryController::class, 'show']);
    Route::get('/data/pembayaran', [PembayaranController::class, 'index']);
    Route::get('/laporan/pembayaran', [LaporanController::class, 'laporanPembayaran']);
    Route::get('/laporan/pembayaran/generate-pdf', [LaporanController::class, 'laporanPembayaranPDF'])->name('laporanPembayaran.pdf.generate');
    Route::get('/laporan/pengiriman', [LaporanController::class, 'laporanPengiriman']);
    Route::get('/laporan/pengiriman/generate-pdf', [LaporanController::class, 'laporanPengirimanPDF'])->name('laporanPengiriman.pdf.generate');

    Route::get('pengguna-sistem', [UserSystemController::class, 'index']);
});

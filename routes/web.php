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
    return view('landing');
})->name('landing');

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

use App\Http\Controllers\DashboardController;

Route::get('/admin', [DashboardController::class, 'admin'])->name('admin');
Route::post('/admin/pinjaman/proses/{id}', [DashboardController::class, 'prosesPinjamanAdmin'])->name('admin.pinjaman.proses');
Route::post('/admin/member/store', [DashboardController::class, 'storeMember'])->name('admin.member.store');
Route::delete('/admin/member/delete/{id}', [DashboardController::class, 'deleteMember'])->name('admin.member.delete');

Route::get('/bendahara', [DashboardController::class, 'bendahara'])->name('bendahara');
Route::post('/bendahara/simpanan/store', [DashboardController::class, 'storeSimpanan'])->name('bendahara.simpanan.store');
Route::post('/bendahara/angsuran/store', [DashboardController::class, 'storeAngsuran'])->name('bendahara.angsuran.store');
Route::post('/bendahara/aset/store', [DashboardController::class, 'storeAset'])->name('bendahara.aset.store');

Route::get('/ketua', [DashboardController::class, 'ketua'])->name('ketua');
Route::post('/ketua/pinjaman/verify/{id}', [DashboardController::class, 'verifikasiPinjamanKetua'])->name('ketua.pinjaman.verify');

Route::get('/member', [DashboardController::class, 'member'])->name('member');
Route::post('/member/pinjaman/store', [DashboardController::class, 'storePinjaman'])->name('member.pinjaman.store');

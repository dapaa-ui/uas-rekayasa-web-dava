<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
Route::get('/', function () {
    return view('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PesananController::class, 'dashboard'])->name('dashboard');
    Route::get('/pesanan/export-pdf', [PesananController::class, 'generatePDF'])->name('pesanan.export');
    
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
Route::delete('/pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('loginUser');



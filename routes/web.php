<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ActivityLogController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('landing');
})->name('landing');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {

    // Semua user login bisa melihat daftar surat dan halaman masuk/keluar
    Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
    Route::get('/surat/masuk', [SuratController::class, 'masuk'])->name('surat.masuk');
    Route::get('/surat/keluar', [SuratController::class, 'keluar'])->name('surat.keluar');

    // Hanya Admin yang bisa mengakses fungsi Create, Store, Edit, Update, Delete, dan Log Aktivitas
    Route::middleware(['admin'])->group(function () {
        Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
        Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');
        Route::get('/surat/{id}/edit', [SuratController::class, 'edit'])->name('surat.edit');
        Route::put('/surat/{id}', [SuratController::class, 'update'])->name('surat.update');
        Route::delete('/surat/{id}', [SuratController::class, 'destroy'])->name('surat.destroy');
        Route::get('/log-aktivitas', [ActivityLogController::class, 'index'])->name('log.index');
    });

});

require __DIR__.'/auth.php';
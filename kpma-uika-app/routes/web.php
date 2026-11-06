<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpmiController;
use App\Http\Controllers\SpmeController;
use App\Http\Controllers\RegulationController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\SpmiDocumentController as AdminSpmiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/spmi/{category}', [SpmiController::class, 'showByCategory'])->name('spmi.category');
Route::get('/spme/{category}', [SpmeController::class, 'showByCategory'])->name('spme.category');
Route::get('/regulations', [RegulationController::class, 'index'])->name('regulations.index');
Route::get('/information', [InformationController::class, 'index'])->name('information.index');
Route::get('/information/{slug}', [InformationController::class, 'show'])->name('information.show');

/*
|--------------------------------------------------------------------------
| Protected Internal "APPS KPMA" Management Routes
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('/spmi', AdminSpmiController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
